<?php

namespace Src\Infrastructure\Laravel\Controllers\Lead;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Src\Entities\Lead\Interactors\GetListInteractor;
use Src\Infrastructure\Laravel\Controllers\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

class ListController extends Controller
{
    public function __construct(
        private GetListInteractor $getListInteractor
    ) {
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        try {
            Session::flash('active_nav', 'lead.index');
            $records = $this->getListInteractor->__invoke();

            return ControllerResponse::format('lead.index', ['records' => $records]);
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('lead.index')]);
        }
    }
}
