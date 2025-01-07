<?php

namespace Concept7\HubspotWebhookClient;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HubspotWebhookClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('hubspot-webhook-client')
            ->hasConfigFile()
            ->hasRoute('web');
    }

    public function bootingPackage(): void
    {
        $configs = config('webhook-client.configs');
        $configs[] = config('hubspot-webhook-client');

        config()->set('webhook-client.configs', $configs);
    }
}
