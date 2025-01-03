<?php

namespace Concept7\HubspotWebhookClient;

use HubSpot\Utils\Signature;
use Illuminate\Http\Request;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator as SpatieSignatureValidator;
use Spatie\WebhookClient\WebhookConfig;

class SignatureValidator implements SpatieSignatureValidator
{
    public function isValid(Request $request, WebhookConfig $config): bool
    {
        return Signature::isValid([
            'signature' => $request->header($config->signatureHeaderName),
            'secret' => $config->signingSecret,
            'requestBody' => $request->getContent(),
            'httpUri' => $request->path(),
            'httpMethod' => $request->method(),
            'signatureVersion' => $request->header('X-HubSpot-Signature-Version'),
        ]);
    }
}
