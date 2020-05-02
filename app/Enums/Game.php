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

    public static function coerce($enumKeyOrValue): ?self
    {
        switch ($enumKeyOrValue) {
            case 'h2x':
                $enumKeyOrValue = self::HALO_2;
                break;
        }

        return parent::coerce($enumKeyOrValue);
    }

    public function getUrlSlug(): string
    {
        switch ($this->value) {
            case self::HALO_2:
                return 'h2x';
        }

        return 'unknown';
    }
}
