<?php
declare(strict_types = 1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * Class Patch
 * @package App\Enums
 * @method static static SERENITY()
 * @method static static SPPF()
 * @method static static PPF()
 */
class Patch extends Enum
{
    public const SERENITY = 1;

    // Not Supported
    public const SPPF = 3;

    // Not Supported
    public const PPF = 5;

    public function getExtension(): string
    {
        switch ($this->value) {
            case self::SERENITY:
                return 'serenity';
            case self::SPPF:
                return 'sppf';
            case self::PPF:
                return 'ppf';
        }

        throw new \BadMethodCallException('This enum has no supported extension ' . $this->key);
    }
}
