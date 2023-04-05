<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Src\Integrations\Salesforce\Exceptions\Oauth2APIException;
use Src\Integrations\Salesforce\Services\RefreshAccessToken;

class RefreshTokenController extends Controller
{
    public function __construct(
        private RefreshAccessToken $refreshAccessToken
    ) {
    }

    /**
     * @throws Oauth2APIException
     */
    public function __invoke(Request $request)
    {
        return $this->refreshAccessToken->__invoke($request);
    }
}
