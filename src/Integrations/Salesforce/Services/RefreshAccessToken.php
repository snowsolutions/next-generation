<?php

namespace Src\Integrations\Salesforce\Services;

use Src\Infrastructure\Laravel\Facades\Configuration;
use Src\Integrations\Salesforce\Clients\Oauth2\Oauth2Client;
use Src\Integrations\Salesforce\Exceptions\Oauth2APIException;
use Src\Integrations\Salesforce\Requests\Oauth2\RequestAccessTokenRequest;
use Src\Integrations\Salesforce\Responses\Oauth2\RefreshAccessTokenResponse;

class RefreshAccessToken
{
    public function __construct(
        private Oauth2Client $oauth2Client
    ) {
    }

    /**
     * @throws Oauth2APIException
     */
    public function __invoke()
    {
        $refreshTokenRequest = new RequestAccessTokenRequest([
            'grant_type' => 'refresh_token',
            'client_id' => config('salesforce.client_id'),
            'client_secret' => config('salesforce.client_secret'),
            'refresh_token' => config('salesforce.refresh_token'),
        ], 'POST');
        $response = new RefreshAccessTokenResponse($this->oauth2Client->call($refreshTokenRequest));
        Configuration::set('salesforce/credential/access_token', $response->getAccessToken());
    }
}
