<?php

namespace App\Providers;

use App\Repositories\InvoiceRepository;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Intervace\InvoiceRepositoryIntervace;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(
            InvoiceRepositoryIntervace::class,
            InvoiceRepository::class
        );
    }
}
