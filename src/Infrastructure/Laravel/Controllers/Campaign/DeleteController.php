<?php

namespace Src\Infrastructure\Laravel\Controllers\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Src\Application\Campaign\Interactors\DeleteInteractor;
use Src\Infrastructure\Laravel\Controllers\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

class DeleteController extends Controller
{
    public function __construct(
        private DeleteInteractor $deleteInteractor
    ) {
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function __invoke($id)
    {
        try {
            $this->deleteInteractor->__invoke($id);
            Session::flash('success', 'Delete successfully');

            return redirect()->route('campaign.index');
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('campaign.index')]);
        }
    }
}
