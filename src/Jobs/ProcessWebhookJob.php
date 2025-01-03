<?php

namespace Concept7\HubspotWebhookClient\Jobs;

use Concept7\HubspotWebhookClient\Events\ContactCreation;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;
use UnhandledMatchError;

class ProcessWebhookJob extends SpatieProcessWebhookJob
{
    public function handle(): void
    {
        collect($this->webhookCall->payload)->each(function (array $event): void {
            match ($event['subscriptionType']) {
                'contact.creation' => ContactCreation::dispatch($event),
                default => throw new UnhandledMatchError,
            };
        });
    }
}
