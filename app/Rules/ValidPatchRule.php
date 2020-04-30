<?php
declare(strict_types = 1);

namespace App\Rules;

use App\Services\Patch\Serenity\SerenityPatch;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

class ValidPatchRule implements Rule
{
    /**
     * @param string $attribute
     * @param UploadedFile $file
     * @return bool|void
     */
    public function passes($attribute, $file)
    {
        $extension = $file->getClientOriginalExtension();

        switch ($extension) {
            case 'serenity':
                return $this->validateSerenity($file);
        }

        return false;
    }

    public function message(): string
    {
        return 'The patch could not be identified.';
    }

    private function validateSerenity(UploadedFile $file): bool
    {
        $serenityPatch = new SerenityPatch();
        try {
            $serenityPatch->extractPatchInfo($file->get());
        } catch (\Throwable $exception) {
            return false;
        }

        return true;
    }
}
