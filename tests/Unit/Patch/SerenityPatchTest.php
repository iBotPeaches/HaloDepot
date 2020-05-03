<?php
declare(strict_types = 1);

namespace Tests\Unit\Patch;

use App\Enums\Patch;
use App\Services\Patch\Serenity\SerenityPatch;
use Illuminate\Support\Arr;
use Tests\TestCase;
use Tests\Traits\HasPatchFile;

class SerenityPatchTest extends TestCase
{
    use HasPatchFile;

    /**
     * @param string $filename
     * @param Patch $patch
     * @param bool $isSerenity
     * @dataProvider magicDataProvider
     */
    public function testMagicParsing(string $filename, Patch $patch, bool $isSerenity): void
    {
        // Arrange
        $file = $this->getPatch($filename, $patch);

        // Act
        $isValid = SerenityPatch::isMagicValid($file);

        // Assert
        $this->assertEquals($isSerenity, $isValid, "{$filename} did not validate as a .serenity file.");
    }

    /**
     * @param string $filename
     * @param Patch $patch
     * @param array $fields
     * @dataProvider fieldExtractionDataProvider
     */
    public function testParsingFileFormat(string $filename, Patch $patch, array $fields): void
    {
        // Arrange
        $file = $this->getPatch($filename, $patch);

        // Act
        $serenityPatch = new SerenityPatch();
        $serenityPatch->extractPatchInfo($file);
        $modImage = $serenityPatch->getModImage();

        // Assert
        $this->assertEquals(Arr::get($fields, 'author'), $serenityPatch->getAuthor());
        $this->assertEquals(Arr::get($fields, 'map_name'), $serenityPatch->getMapName());
        $this->assertEquals(Arr::get($fields, 'mod_name'), $serenityPatch->getModMapName());
        $this->assertEquals(Arr::get($fields, 'mod_title'), $serenityPatch->getModName());
        $this->assertEquals(Arr::get($fields, 'description'), $serenityPatch->getModDescription());
        $this->assertEquals(Arr::get($fields, 'image.width'), $modImage->width());
        $this->assertEquals(Arr::get($fields, 'image.height'), $modImage->height());
    }

    public function fieldExtractionDataProvider(): array
    {
        return [
            [
                'filename' => '1337meteors.serenity',
                'type'     => Patch::SERENITY(),
                'fields'   => [
                    'author'      => 'TheTyckoMan',
                    'map_name'    => 'ascension.map',
                    'mod_name'    => '1337 Meteors.map',
                    'mod_title'   => '1337 Meteors',
                    'description' => 'Avoid the pesky kill-taking meteors...this is the life of the people who play 1337 meteors...',
                    'image'       => [
                        'width'  => 224,
                        'height' => 207,
                    ],
                ],
            ],
            [
                'filename' => 'DeadInTheWater.serenity',
                'type'     => Patch::SERENITY(),
                'fields'   => [
                    'author'      => 'pyroman31',
                    'map_name'    => 'ascension.map',
                    'mod_name'    => 'deadinthewater.map',
                    'mod_title'   => 'Dead in the Water',
                    'description' => 'You have been left on an island for dead. Escape and you will be honored, but die and you will join the others. Can you survive?',
                    'image'       => [
                        'width'  => 224,
                        'height' => 207,
                    ],
                ],
            ],
            [
                'filename' => 'Delphia.serenity',
                'type'     => Patch::SERENITY(),
                'fields'   => [
                    'author'      => 'Boranes',
                    'map_name'    => 'lockout.map',
                    'mod_name'    => 'delphia.map',
                    'mod_title'   => 'Delphia',
                    'description' => 'With Halo destroyed, the ancient flood research facility is now an over-growth of plant life and insects.',
                    'image'       => [
                        'width'  => 224,
                        'height' => 207,
                    ],
                ],
            ],
            [
                'filename' => 'BlockFortFinal.serenity',
                'type'     => Patch::SERENITY(),
                'fields'   => [
                    'author'      => 'Unknown',
                    'map_name'    => 'gemini.map',
                    'mod_name'    => 'gemini.map',
                    'mod_title'   => 'Block Fort',
                    'description' => 'Mario Kart 64 Multiplayer Level',
                    'image'       => [
                        'width'  => 224,
                        'height' => 207,
                    ],
                ],
            ],
        ];
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
