<?php
declare(strict_types = 1);

namespace App\Services\IO;

use App\Enums\Endian;

interface BinaryReaderInterface
{
    public function setup(string $input, Endian $endianness);

    public function readByte(): int;
    public function readUByte(): int;

    public function readShort(): int;
    public function readUShort(): int;

    public function readInt32(): int;
    public function readUInt32(): int;

    public function readInt64(): int;
    public function readUInt64(): int;

    public function readBytes(int $length);

    public function readString(int $length): string;

    public function location(): int;
    public function appendSeek(int $position): self;
    public function seek(int $position): self;
}
