<?php
declare(strict_types = 1);

namespace App\Services\Patch\Serenity;

use App\Services\Patch\AbstractPatch;

class SerenityPatch extends AbstractPatch
{
    const MAGIC = '1400000F';

    public static function getMagic(): string
    {
        return hex2bin(self::MAGIC);
    }
}
