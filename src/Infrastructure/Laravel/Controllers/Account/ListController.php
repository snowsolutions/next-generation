<?php

namespace Src\Infrastructure\Laravel\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Src\Application\Account\Interactors\GetListInteractor;
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
            Session::flash('active_nav', 'account.index');
            $records = $this->getListInteractor->__invoke();

            return ControllerResponse::format('account.index', ['records' => $records]);
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('account.index')]);
        }
    }
}
