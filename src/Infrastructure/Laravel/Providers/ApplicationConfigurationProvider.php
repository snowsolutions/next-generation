<?php

namespace Src\Infrastructure\Laravel\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Infrastructure\Laravel\Facades\Configuration;

class ApplicationConfigurationProvider extends ServiceProvider
{
    /**
     * Load initialize env variable to configuration
     */
    public function register(): void
    {
        if (! Configuration::getValue('salesforce/credential/access_token', true)) {
            Configuration::set('salesforce/credential/access_token', config('salesforce.access_token'), true);
        }
    }
}
