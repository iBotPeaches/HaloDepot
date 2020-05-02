<?php
declare(strict_types = 1);

namespace App\Rules;

use App\Services\Patch\Serenity\SerenityPatch;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

class ValidPatchRule implements Rule
{
    protected string $message = 'This patch format could not be identified.';

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
        return $this->message;
    }

    private function validateSerenity(UploadedFile $file): bool
    {
        $serenityPatch = new SerenityPatch();
        try {
            $serenityPatch->extractPatchInfo($file->get());

            if (empty($serenityPatch->getModName())) {
                $this->message = 'Mod must have a mod name.';
                return false;
            }

            if (empty($serenityPatch->getAuthor())) {
                $this->message = 'Mod must have an author.';
                return false;
            }

            if (empty($serenityPatch->getModDescription())) {
                $this->message = 'Mod must have a description.';
                return false;
            }

            if ($serenityPatch->getModImage()->getWidth() < 5) {
                $this->message = 'Mod must have a preview image.';
                return false;
            }
        } catch (\Throwable $exception) {
            return false;
        }

        return true;
    }
}
