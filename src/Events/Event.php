<?php

namespace Concept7\HubspotWebhookClient\Events;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Event implements ShouldQueue
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public array $event
    ) {}
}
