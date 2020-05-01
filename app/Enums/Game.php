<?php
declare(strict_types = 1);

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * Class Game
 * @package App\Enums
 * @method static static HALO_2()
 */
class Game extends Enum implements LocalizedEnum
{
    const HALO_2 = 1;
}
