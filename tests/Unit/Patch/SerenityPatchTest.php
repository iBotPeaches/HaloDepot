<?php
declare(strict_types = 1);

namespace Tests\Unit\Patch;

use App\Enums\Patch;
use App\Services\Patch\Serenity\SerenityPatch;
use Tests\TestCase;
use Tests\Traits\HasPatchFile;

class SerenityPatchTest extends TestCase
{
    use HasPatchFile;

    /** @dataProvider magicDataProvider */
    public function testMagicParsing(string $filename, Patch $patch, bool $isSerenity): void
    {
        // Arrange
        $file = $this->getPatch($filename, $patch);

        // Act
        $isValid = SerenityPatch::isValid($file);

        // Assert
        $this->assertEquals($isSerenity, $isValid, "{$filename} did not validate as a .serenity file.");
    }

    public function magicDataProvider(): array
    {
        return [
            [
                'filename'    => '1337meteors.serenity',
                'type'        => Patch::SERENITY(),
                'is_serenity' => true,
            ],
            [
                'filename' => 'DeadInTheWater.serenity',
                'type' => Patch::SERENITY(),
                'is_serenity' => true,
            ],
            [
                'filename' => 'Delphia.serenity',
                'type' => Patch::SERENITY(),
                'is_serenity' => true,
            ],
            [
                'filename' => 'yaymoddies.ppf',
                'type' => Patch::PPF(),
                'is_serenity' => false,
            ],
            [
                'filename' => 'a_rip_in_time.sppf',
                'type' => Patch::SPPF(),
                'is_serenity' => false
            ],
        ];
    }
}
