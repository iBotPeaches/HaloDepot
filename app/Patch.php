<?php
declare(strict_types = 1);

namespace App;

use App\Enums\Game as GameEnum;
use App\Enums\Patch as PatchEnum;
use BenSampo\Enum\Traits\CastsEnums;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Patch
 * @package App
 * @property int $id
 * @property GameEnum $game
 * @property PatchEnum $patch
 * @property string $hash
 * @property string $name
 * @property string $author
 * @property string $description
 * @property string $image_path
 * @property string $file_path
 * @property int $views
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 */
class Patch extends Model
{
    use CastsEnums;

    protected $guarded = ['id', 'views'];

    protected $enumCasts = [
        'game'  => GameEnum::class,
        'patch' => PatchEnum::class,
    ];

    protected $casts = [
        'game'  => 'int',
        'patch' => 'int',
    ];
}
