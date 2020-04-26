<?php
declare(strict_types = 1);

namespace Tests\Unit\Patch;

use App\Services\Patch\Serenity\SerenityPatch;
use Tests\TestCase;
use Tests\Traits\HasSerenityPatch;

class SerenityPatchTest extends TestCase
{
    use HasSerenityPatch;

    public function testMagicParsing(): void
    {
        // Arrange
        $file = $this->getSerenityPatch('1337meteors.serenity');

        // Act
        $isSerenity = SerenityPatch::isValid($file);

        // Assert
        $this->assertTrue($isSerenity, 'Serenity patch (1337meteors) did not validate as .serenity.');
    }
}
