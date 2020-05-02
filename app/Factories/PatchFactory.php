<?php
declare(strict_types = 1);

namespace App\Factories;

use App\Enums\Game;
use App\Patch;
use App\Services\Patch\Serenity\SerenityPatch;
use Illuminate\Http\UploadedFile;
use App\Enums\Patch as PatchEnum;
use Ramsey\Uuid\Uuid;

class PatchFactory
{
    public static function identifyAddPatch(UploadedFile $file): ?Patch
    {
        $extension = $file->getClientOriginalExtension();
        switch ($extension) {
            case 'serenity':
                return self::createSerenityPatch($file);
        }

        return null;
    }

    private static function createSerenityPatch(UploadedFile $file): ?Patch
    {
        $serenityPatch = new SerenityPatch();
        $serenityPatch->extractPatchInfo($file->get());

        $patch = self::createBasePatch(Game::HALO_2(), PatchEnum::SERENITY());
        $patch->name = $serenityPatch->getModName();
        $patch->map = $serenityPatch->getMapName();
        $patch->author = $serenityPatch->getAuthor();
        $patch->description = $serenityPatch->getModDescription();
        $patch->filesize = $file->getSize();

        // extra payload data (modded map name + map name)
        $patch->data = [
            'modded_map' => $serenityPatch->getModMapName()
        ];

        // Store patch & image
        $patch->uploadPatch($file->get());
        $patch->uploadImage($serenityPatch->getModImage());

        $patch->saveOrFail();

        return $patch;
    }

    private static function createBasePatch(Game $game, PatchEnum $patch): Patch
    {
        return new Patch([
            'game'  => $game->value,
            'patch' => $patch->value,
        ]);
    }
}
