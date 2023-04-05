<?php

namespace Src\Integrations\Salesforce\Responses\Oauth2;

class RefreshAccessTokenResponse extends Oauth2Response
{
    protected array $additionalResponseFields = [
        'access_token',
        'signature',
        'scope',
        'instance_url',
        'id',
        'token_type',
        'issued_at',
    ];

    public function getAccessToken()
    {
        return $this->access_token;
    }
}
