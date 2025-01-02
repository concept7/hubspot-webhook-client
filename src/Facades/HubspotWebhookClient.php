<?php

namespace Concept7\HubspotWebhookClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Concept7\HubspotWebhookClient\HubspotWebhookClient
 */
class HubspotWebhookClient extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Concept7\HubspotWebhookClient\HubspotWebhookClient::class;
    }
}
