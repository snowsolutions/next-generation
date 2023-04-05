<?php

namespace Src\Infrastructure\Laravel\Controllers\Auth;

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
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws Oauth2APIException
     */
    public function __invoke(Request $request)
    {
        /**
         * Redirect back to previous URL
         */
        $redirectUrl = $request->get('prevUrl');
        if (! $redirectUrl) {
            $redirectUrl = '/';
        }
        $this->refreshAccessToken->__invoke();

        return redirect()->to($redirectUrl);
    }
}
