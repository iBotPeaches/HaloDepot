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

            $modName = $serenityPatch->getModName();
            if (empty($modName) || ! ctype_print($modName)) {
                $this->message = 'Mod must have a mod name.';
                return false;
            }

            $authorName = $serenityPatch->getAuthor();
            if (empty($authorName) || ! ctype_print($authorName)) {
                $this->message = 'Mod must have an author.';
                return false;
            }

            $modDescription = $serenityPatch->getModDescription();
            if (empty($modDescription) || ! ctype_print($modDescription)) {
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
