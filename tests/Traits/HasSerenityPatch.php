<?php
declare(strict_types = 1);

namespace Tests\Traits;

trait HasSerenityPatch
{
    public function getSerenityPatch(string $filename): string
    {
        $file = $this->getStoragePath() . $filename;

        return file_get_contents($file);
    }

    private function getStoragePath(): string
    {
        return storage_path('stubs/serenity/');
    }
}
