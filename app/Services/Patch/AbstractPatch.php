<?php
declare(strict_types = 1);

namespace App\Services\Patch;

use App\Services\IO\BinaryReader;
use App\Services\IO\BinaryReaderInterface;

abstract class AbstractPatch implements PatchFormatInterface
{
    /** @var BinaryReaderInterface  */
    protected BinaryReaderInterface $reader;

    public function __construct()
    {
        $this->reader = resolve(BinaryReaderInterface::class);
    }

    public static function isMagicValid(string $file): bool
    {
        /** @var BinaryReader $reader */
        $reader = resolve(BinaryReaderInterface::class);
        $reader->setup($file);

        $expectedMagic = static::getMagic();
        $magic = $reader->seek(0x0)->readBytes(0x4);

        return $expectedMagic === $magic;
    }
}
