<?php

namespace Concept7\HubspotWebhookClient\Commands;

use Illuminate\Console\Command;

class HubspotWebhookClientCommand extends Command
{
    public $signature = 'hubspot-webhook-client';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
