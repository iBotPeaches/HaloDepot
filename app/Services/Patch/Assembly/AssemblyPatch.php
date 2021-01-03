<?php
declare(strict_types = 1);

namespace App\Services\Patch\Assembly;

use App\Enums\Endian;
use App\Services\Patch\AbstractPatch;
use App\Services\Patch\Traits\HasPatchValues;
use Illuminate\Support\Str;

class AssemblyPatch extends AbstractPatch
{
    use HasPatchValues;

    const MAGIC = '61736D70';
    const BITMAP_HEADER = '';
    const MAX_TITL_VERSION = 3;

    public static function getMagic(): string
    {
        return hex2bin(self::MAGIC);
    }

    public function extractPatchInfo(string $contents): void
    {
        $this->reader->setup($contents, Endian::LITTLE());

        // The Assembly patch format is BLOCK based, so each segment (deprecated or not)
        // Should follow the same size.
        // Header: {name}{size}{version} - {int32}{int32}{byte} - 9 bytes

        // The first block is a large ASMP block which handles entire patch. Since we just
        // want metadata, lets skip it.
        $this->reader->appendSeek(0x09);

        // Now we should start reading the TITL block which has the good metadata.
        $this->readTitlBlock();
    }

    private function readTitlBlock(): void
    {
        $name = $this->reader->readString(4);
        $version = $this->reader
            ->appendSeek(0x4)
            ->readByte();

        $this->setPatchVersion($version);
        if ($name !== 'titl') {
            return;
        }

        if ($version > self::MAX_TITL_VERSION) {
            return;
        }

        // Version 0
        $mapId = $this->reader->readInt32();
        $mapInternalName = $this->reader->readNullTerminatedString();
        $this->reader->readByte();
        $patchName = $this->reader->readNullTerminatedUtf16String();
        $patchDescription = $this->reader->readNullTerminatedUtf16String();
        $patchAuthor = $this->reader->readNullTerminatedUtf16String();

        // TODO - OFF BY 1 ByTE - WHY

        // Screenshot
        $length = $this->reader->readUInt32();
        if ($length > 0) {
            $imageData = $this->reader->readBytes($length);
        }

        // Version 1
        if ($version >= 1) {
            if ($version >= self::MAX_TITL_VERSION) {
                $metaPokeBase = $this->reader->readInt64();
            } else {
                $metaPokeBase = $this->reader->readUInt32();
            }
            $metaChangeIndex = $this->reader->readByte();
        }

        if ($version >= 2) {
            $outputName = $this->reader->readNullTerminatedString();
        }

        if ($version == 3) {
            $isPc = $this->reader->readByte();
            $buildString = $this->reader->readNullTerminatedString();
        }
    }
}
