<?php
declare(strict_types = 1);

namespace App\Providers;

use App\Observers\PatchObserver;
use App\Patch;
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
        $this->bindObservers();
    }

    private function bindObservers(): void
    {
        Patch::observe(PatchObserver::class);
    }

    private function bindServices(): void
    {
        $this->app->bind(BinaryReaderInterface::class, BinaryReader::class);
    }
}
