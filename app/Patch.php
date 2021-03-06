<?php
declare(strict_types = 1);

namespace App;

use App\Enums\Game as GameEnum;
use App\Enums\Patch as PatchEnum;
use BenSampo\Enum\Traits\CastsEnums;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Image;
use Ramsey\Uuid\Uuid;

/**
 * Class Patch
 * @package App
 * @property int $id
 * @property GameEnum $game
 * @property PatchEnum $patch
 * @property string $hash
 * @property string $slug
 * @property string $name
 * @property string $map
 * @property string $author
 * @property string $description
 * @property string $image_path
 * @property string $file_path
 * @property int $downloads
 * @property int $filesize
 * @property array $data
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @method static ofMap(string $map)
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
        'data'  => 'array',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    # region Mutators

    public function setMapAttribute(string $map): void
    {
        $this->attributes['map'] = Str::replaceLast('.map', null, $map);
    }

    # endregion

    # region Scopes

    public function scopeOfMap(Builder $query, string $map = null): Builder
    {
        if (empty($map)) {
            return $query;
        }

        return $query->where('map', $map);
    }

    # endregion

    # region Functions

    public function uploadPatch(string $contents): void
    {
        $filename = $this->patch->key . '-' . Uuid::uuid4();
        Storage::disk('s3')->put($filename, $contents);

        $this->hash = md5($contents);
        $this->file_path = $filename;
    }

    public function uploadImage(Image $image): void
    {
        $filename = $this->patch->key . '-image-' . Uuid::uuid4() . '.png';
        Storage::disk('local')->put('/public/images/' . $filename, (string) $image->encode('png'));

        $this->image_path = $filename;
    }

    public function image(): string
    {
        return asset('/storage/images/' . $this->image_path);
    }

    public function patchFileName(): string
    {
        return $this->slug . '.' . $this->patch->getExtension();
    }

    public function humanFilesize(): string
    {
        $units = ['B', 'KB', 'MB'];

        for ($i = 0; $this->filesize > 1024; $i++) {
            $this->filesize /= 1024;
        }
        return round($this->filesize, 2) . ' ' . $units[$i];
    }

    # endregion
}
