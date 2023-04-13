<?php

namespace Src\Infrastructure\Laravel\Controllers\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Src\Application\Campaign\Interactors\ViewInteractor;
use Src\Infrastructure\Laravel\Controllers\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

class ViewController extends Controller
{
    public function __construct(
        private ViewInteractor $viewInteractor
    ) {
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke($id)
    {
        try {
            Session::flash('active_nav', 'campaign.index');
            $record = $this->viewInteractor->__invoke($id);

            return ControllerResponse::format('campaign.view', ['record' => $record]);
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('lead.view', [$id])]);
        }
    }
}
