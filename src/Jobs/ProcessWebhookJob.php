<?php

namespace Concept7\HubspotWebhookClient\Jobs;

use Concept7\HubspotWebhookClient\Events;
use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;
use UnhandledMatchError;

class ProcessWebhookJob extends SpatieProcessWebhookJob
{
    public function handle(): void
    {
        collect($this->webhookCall->payload)->each(function (array $event): void {
            match ($event['subscriptionType']) {
                'company.creation' => Events\CompanyCreation::dispatch($event),
                'company.deletion' => Events\CompanyDeletion::dispatch($event),
                'contact.creation' => Events\ContactCreation::dispatch($event),
                'contact.deletion' => Events\ContactDeletion::dispatch($event),
                'deal.creation' => Events\DealCreation::dispatch($event),
                'deal.deletion' => Events\DealDeletion::dispatch($event),
                'line_item.propertyChange' => Events\LineItemPropertyChange::dispatch($event),
                default => throw new UnhandledMatchError,
            };
        });
    }
}
