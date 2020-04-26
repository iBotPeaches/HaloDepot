<?php
declare(strict_types = 1);

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    public function testBasicHomepageLoadingTest(): void
    {
        // Arrange

        // Act
        $response = $this->get('/');

        // Assert
        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertSeeText('Halo Depot');
    }
}
