<?php
declare(strict_types = 1);

namespace App\Services\Patch;

interface PatchFormatInterface
{
    public static function getMagic(): string;
    public function extractPatchInfo(string $contents): void;
}
