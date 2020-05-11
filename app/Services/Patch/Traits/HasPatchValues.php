<?php
declare(strict_types = 1);

namespace App\Services\Patch\Traits;

use Intervention\Image\Image;
use Intervention\Image\ImageManagerStatic as ImageManager;

trait HasPatchValues
{
    private string $mapName;
    private string $modMapName;
    private string $author;
    private string $modName;
    private string $modDescription;
    private Image $modImage;
    private int $patchVersion;

    # region Setters

    public function setMapName(string $name): self
    {
        $this->mapName = $name;
        return $this;
    }

    public function setModMapName(string $name): self
    {
        $this->modMapName = $name;
        return $this;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;
        return $this;
    }

    public function setModName(string $modName): self
    {
        $this->modName = $modName;
        return $this;
    }

    public function setModDescription(string $description): self
    {
        $this->modDescription = $description;
        return $this;
    }

    public function setModImage(string $contents, string $header = null): self
    {
        if ($header) {
            $header = hex2bin($header);
        }

        // For some reason DDS preview images need to be rotated 180.
        $this->modImage = ImageManager::make($header . $contents)->rotate(180);
        return $this;
    }

    public function setPatchVersion(int $version): self
    {
        $this->patchVersion = $version;
        return $this;
    }

    # endregion

    # region Getters

    public function getAuthor(): string
    {
        return $this->author ?? '';
    }

    public function getMapName(): string
    {
        return $this->mapName ?? '';
    }

    public function getModMapName(): string
    {
        return $this->modMapName ?? '';
    }

    public function getModName(): string
    {
        return $this->modName ?? '';
    }

    public function getModDescription(): string
    {
        return trim($this->modDescription ?? '');
    }

    public function getModImage(): Image
    {
        return $this->modImage ?? new Image();
    }

    public function getPatchVersion(): int
    {
        return $this->patchVersion ?? 1;
    }

    # endregion
}
