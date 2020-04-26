<?php
declare(strict_types = 1);

namespace App\Enums;

use BenSampo\Enum\Enum;

class Endianness extends Enum
{
    public const LITTLE = 'little';

    public const BIG = 'big';
}
