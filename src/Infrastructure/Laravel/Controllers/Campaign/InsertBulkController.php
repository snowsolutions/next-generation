<?php

namespace Src\Infrastructure\Laravel\Controllers\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Src\Application\Campaign\Interactors\InsertBulkInteractor;
use Src\Infrastructure\Laravel\Controllers\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

class InsertBulkController extends Controller
{
    public function __construct(
        private InsertBulkInteractor $insertBulkInteractor
    ) {
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $this->insertBulkInteractor->__invoke($request);
            Session::flash('success', 'The bulk data has been queued and will be process underground');

            return redirect()->route('campaign.bulk.insert_view');
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('campaign.bulk.insert_view')]);
        }
    }
}
