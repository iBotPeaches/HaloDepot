<?php
declare(strict_types = 1);

namespace App\Services\Patch;

use App\Services\IO\BinaryReader;
use App\Services\IO\BinaryReaderInterface;

abstract class AbstractPatch implements PatchFormatInterface
{
    public static function isValid(string $file): bool
    {
        /** @var BinaryReader $reader */
        $reader = resolve(BinaryReaderInterface::class);

        $reader->make($file);

        $expectedMagic = static::getMagic();
        $magic = $reader->seek(0x0)->readBytes(0x4);

        return $expectedMagic === $magic;
    }
}
