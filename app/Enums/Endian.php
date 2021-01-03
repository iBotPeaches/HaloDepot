<?php
declare(strict_types = 1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * Class Endianness
 * @package App\Enums
 * @method static static BIG()
 * @method static static LITTLE()
 */
class Endian extends Enum
{
    public const BIG = 1;

    public const LITTLE = 2;
}
