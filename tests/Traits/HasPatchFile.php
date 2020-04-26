<?php
declare(strict_types = 1);

namespace Tests\Traits;

use App\Enums\Patch;

trait HasPatchFile
{
    public function getPatch(string $filename, Patch $patch): string
    {
        $file = $this->getStoragePath($patch) . $filename;

        return file_get_contents($file);
    }

    private function getStoragePath(Patch $patch): string
    {
        return storage_path("stubs/{$patch->getExtension()}/");
    }
}
