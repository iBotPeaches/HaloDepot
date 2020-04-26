<?php
declare(strict_types = 1);

namespace App\Providers;

use App\Services\IO\BinaryReader;
use App\Services\IO\BinaryReaderInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->bindServices();
    }

    private function bindServices(): void
    {
        $this->app->bind(BinaryReaderInterface::class, BinaryReader::class);
    }
}
