<?php
declare(strict_types = 1);

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * Class Map
 *
 * @method static static H2X_00A_INTRODUCTION()
 * @method static static H2X_01A_TUTORIAL()
 * @method static static H2X_01B_SPACESTATION()
 * @method static static H2X_03A_OLDMOMBASA()
 * @method static static H2X_03B_NEWMOMBASA()
 * @method static static H2X_04A_GASGIANT()
 * @method static static H2X_04B_FLOODLAB()
 * @method static static H2X_05A_DELTAAPPROACH()
 * @method static static H2X_05B_DELTATOWERS()
 * @method static static H2X_06A_SENTINELWALLS()
 * @method static static H2X_06B_FLOODZONE()
 * @method static static H2X_07A_HIGHCHARITY()
 * @method static static H2X_07B_FORERUNNERSHIP()
 * @method static static H2X_08A_DELTACLIFFS()
 * @method static static H2X_08B_DELTACONTROL()
 * @method static static H2X_ASCENSION()
 * @method static static H2X_BACKWASH()
 * @method static static H2X_BEAVERCREEK()
 * @method static static H2X_BURIAL_MOUNDS()
 * @method static static H2X_COAGULATION()
 * @method static static H2X_COLOSSUS()
 * @method static static H2X_CYCLOTRON()
 * @method static static H2X_FOUNDATION()
 * @method static static H2X_HEADLONG()
 * @method static static H2X_LOCKOUT()
 * @method static static H2X_MIDSHIP()
 * @method static static H2X_WATERWORKS()
 * @method static static H2X_ZANZIBAR()
 * @method static static H2X_CONTAINMENT()
 * @method static static H2X_DELTATAP()
 * @method static static H2X_DUNE()
 * @method static static H2X_ELONGATION()
 * @method static static H2X_GEMINI()
 * @method static static H2X_TRIPLICATE()
 * @method static static H2X_TURF()
 * @method static static H2X_WARLOCK()
 * @method static static H2X_NEEDLE()
 * @method static static H2X_STREET_SWEEPER()
 * @method static static H2X_DERELICT()
 * @method static static H2X_HIGHPLAINS()
 * @package App\Enums
 */
final class Map extends Enum implements LocalizedEnum
{
    // Campaign
    public const H2X_00A_INTRODUCTION = '00a_introduction';
    public const H2X_01A_TUTORIAL = '01a_tutorial';
    public const H2X_01B_SPACESTATION = '01b_spacestation';
    public const H2X_03A_OLDMOMBASA = '03a_oldmombasa';
    public const H2X_03B_NEWMOMBASA = '03b_newmombasa';
    public const H2X_04A_GASGIANT = '04a_gasgiant';
    public const H2X_04B_FLOODLAB = '04b_floodlab';
    public const H2X_05A_DELTAAPPROACH = '05a_deltaapproach';
    public const H2X_05B_DELTATOWERS = '05b_deltatowers';
    public const H2X_06A_SENTINELWALLS = '06a_sentinelwalls';
    public const H2X_06B_FLOODZONE = '06b_floodzone';
    public const H2X_07A_HIGHCHARITY = '07a_highcharity';
    public const H2X_07B_FORERUNNERSHIP = '07b_forerunnership';
    public const H2X_08A_DELTACLIFFS = '08a_deltacliffs';
    public const H2X_08B_DELTACONTROL = '08b_deltacontrol';

    // MP - Disc
    public const H2X_ASCENSION = 'ascension';
    public const H2X_BACKWASH = 'backwash';
    public const H2X_BEAVERCREEK = 'beavercreek';
    public const H2X_BURIAL_MOUNDS = 'burial_mounds';
    public const H2X_COAGULATION = 'coagulation';
    public const H2X_COLOSSUS = 'colossus';
    public const H2X_CYCLOTRON = 'cyclotron';
    public const H2X_FOUNDATION = 'foundation';
    public const H2X_HEADLONG = 'headlong';
    public const H2X_LOCKOUT = 'lockout';
    public const H2X_MIDSHIP = 'midship';
    public const H2X_WATERWORKS = 'waterworks';
    public const H2X_ZANZIBAR = 'zanzibar';

    // MP - DLC
    public const H2X_CONTAINMENT = 'containment';
    public const H2X_DELTATAP = 'deltatap';
    public const H2X_DUNE = 'dune';
    public const H2X_ELONGATION = 'elongation';
    public const H2X_GEMINI = 'gemini';
    public const H2X_TRIPLICATE = 'triplicate';
    public const H2X_TURF = 'turf';
    public const H2X_WARLOCK = 'warlock';
    public const H2X_NEEDLE = 'needle';
    public const H2X_STREET_SWEEPER = 'street_sweeper';
    public const H2X_DERELICT = 'derelict';
    public const H2X_HIGHPLAINS = 'highplains';

    public static function getH2MultiplayerMaps(): array
    {
        return collect([
            self::H2X_ASCENSION(),
            self::H2X_BACKWASH(),
            self::H2X_BEAVERCREEK(),
            self::H2X_BURIAL_MOUNDS(),
            self::H2X_COAGULATION(),
            self::H2X_COLOSSUS(),
            self::H2X_CONTAINMENT(),
            self::H2X_CYCLOTRON(),
            self::H2X_DELTATAP(),
            self::H2X_DERELICT(),
            self::H2X_DUNE(),
            self::H2X_ELONGATION(),
            self::H2X_FOUNDATION(),
            self::H2X_GEMINI(),
            self::H2X_HEADLONG(),
            self::H2X_HIGHPLAINS(),
            self::H2X_LOCKOUT(),
            self::H2X_MIDSHIP(),
            self::H2X_NEEDLE(),
            self::H2X_STREET_SWEEPER(),
            self::H2X_TRIPLICATE(),
            self::H2X_TURF(),
            self::H2X_WARLOCK(),
            self::H2X_WATERWORKS(),
            self::H2X_ZANZIBAR(),
        ])->sortBy(function (Map $map) {
            return $map->description;
        })->toArray();
    }

    public static function getH2SingleplayerMaps(): array
    {
        return [
            self::H2X_00A_INTRODUCTION(),
            self::H2X_01A_TUTORIAL(),
            self::H2X_01B_SPACESTATION(),
            self::H2X_03A_OLDMOMBASA(),
            self::H2X_03B_NEWMOMBASA(),
            self::H2X_04A_GASGIANT(),
            self::H2X_04B_FLOODLAB(),
            self::H2X_05A_DELTAAPPROACH(),
            self::H2X_05B_DELTATOWERS(),
            self::H2X_06A_SENTINELWALLS(),
            self::H2X_06B_FLOODZONE(),
            self::H2X_07A_HIGHCHARITY(),
            self::H2X_07B_FORERUNNERSHIP(),
            self::H2X_08A_DELTACLIFFS(),
            self::H2X_08B_DELTACONTROL()
        ];
    }

    public static function getMaps(Game $game): array
    {
        switch ($game) {
            case Game::HALO_2():
                return [
                    'sp' => self::getH2SingleplayerMaps(),
                    'mp' => self::getH2MultiplayerMaps()
                ];
        }

        return [
            'sp' => [],
            'mp' => []
        ];
    }
}
