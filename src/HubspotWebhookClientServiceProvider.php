<?php

namespace Concept7\HubspotWebhookClient;

use Concept7\HubspotWebhookClient\Commands\HubspotWebhookClientCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HubspotWebhookClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('hubspot-webhook-client')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_hubspot_webhook_client_table')
            ->hasCommand(HubspotWebhookClientCommand::class);
    }
}
