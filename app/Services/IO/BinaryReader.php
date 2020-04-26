<?php
declare(strict_types = 1);

namespace App\Services\IO;

use App\Enums\Endianness;

class BinaryReader implements BinaryReaderInterface
{
    private \PhpBinaryReader\BinaryReader $reader;

    public function setup(string $input, Endianness $endianness = null)
    {
        $this->reader = new \PhpBinaryReader\BinaryReader($input, $endianness->value ?? Endianness::LITTLE);
    }

    public function readByte(): int
    {
        return $this->reader->readInt8();
    }

    public function readUByte(): int
    {
        return $this->reader->readUInt8();
    }

    public function readShort(): int
    {
        return $this->reader->readInt16();
    }

    public function readUShort(): int
    {
        // For some reason the parent implementation returns a string
        // @see https://github.com/mdurrant/php-binary-reader/issues/17
        return (int) $this->reader->readUInt16();
    }

    public function readInt32(): int
    {
        return $this->reader->readInt32();
    }

    public function readUInt32(): int
    {
        return $this->reader->readUInt32();
    }

    public function readInt64(): int
    {
        return $this->reader->readInt64();
    }

    public function readUInt64(): int
    {
        return $this->reader->readUInt64();
    }

    public function readBytes(int $length)
    {
        return $this->reader->readBytes($length);
    }

    public function readString(int $length): string
    {
        return $this->reader->readString($length);
    }

    public function readAlignedString(int $length): string
    {
        return $this->reader->readAlignedString($length);
    }

    public function location(): int
    {
        return $this->reader->getPosition();
    }

    public function seek(int $position): self
    {
        $this->reader->setPosition($position);
        return $this;
    }

    public function appendSeek(int $length): self
    {
        $this->reader->setPosition($this->location() + $length);
        return $this;
    }
}
