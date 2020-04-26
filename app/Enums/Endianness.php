<?php
declare(strict_types = 1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * Class Endianness
 * @package App\Enums
 * @method static static LITTLE()
 * @method static static BIG()
 */
class Endianness extends Enum
{
    public const LITTLE = 'little';

    public const BIG = 'big';
}
