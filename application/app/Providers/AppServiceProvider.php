<?php

namespace App\Providers;

use App\Services\Contact\ContactService;
use App\Services\Contact\Sources\AccountContactSource;
use App\Services\Contact\Sources\LeadContactSource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ContactService::class, function () {
            $service = new ContactService();

            // Register default sources
            $service->registerSource('lead', new LeadContactSource());
            $service->registerSource('account', new AccountContactSource());

            return $service;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
