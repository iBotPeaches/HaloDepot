<?php
declare(strict_types = 1);

namespace App\Services\Patch\Serenity;

use App\Enums\Endian;
use App\Services\Patch\AbstractPatch;
use App\Services\Patch\Traits\HasPatchValues;
use Illuminate\Support\Str;

class SerenityPatch extends AbstractPatch
{
    use HasPatchValues;

    const MAGIC = '1400000F';

    const BITMAP_HEADER = '424DC8C70200000000003600000028000000E0000000CF000000010020000000000092C70200120B0000120B00000000000000000000';

    public static function getMagic(): string
    {
        return hex2bin(self::MAGIC);
    }

    public function extractPatchInfo(string $contents): void
    {
        $this->reader->setup($contents, Endian::LITTLE());

        $authorOrMapName = $this->readAuthor();
        if (Str::contains($authorOrMapName, '.map')) {
            $this->setAuthor('Unknown');
            $this->setMapName($authorOrMapName);
            $this->setModMapName($this->readModMapName());
            $this->setModName($this->readModName());
            $this->setModDescription($this->readDescription());
            $this->setModImage($this->readModImage(), self::BITMAP_HEADER);
        } else {
            $this->setAuthor($authorOrMapName);
            $this->setMapName($this->readMapName());
            $this->setModMapName($this->readModMapName());
            $this->setModName($this->readModName());
            $this->setModDescription($this->readDescription());
            $this->setModImage($this->readModImage(), self::BITMAP_HEADER);
        }
    }

    private function readAuthor(): string
    {
        $length = $this->reader
            ->seek(0x20)
            ->readUShort();

        return $this->reader
            ->appendSeek(0x2)
            ->readString($length);
    }

    private function readMapName(): string
    {
        $length = $this->reader
            ->readUShort();

        return $this->reader
            ->appendSeek(0x2)
            ->readString($length);
    }

    private function readModMapName(): string
    {
        $length = $this->reader
            ->readUShort();

        return $this->reader
            ->appendSeek(0x2)
            ->readString($length);
    }

    private function readModName(): string
    {
        $length = $this->reader
            ->readUShort();

        return $this->reader
            ->appendSeek(0x2)
            ->readString($length);
    }

    private function readDescription(): string
    {
        $length = $this->reader
            ->readUShort();

        if ($length > 255) {
            return '';
        }

        return $this->reader
            ->appendSeek(0x2)
            ->readString($length);
    }

    private function readModImage()
    {
        return $this->reader
            ->appendSeek(0x4)
            ->readBytes(0x2D480);
    }
}
