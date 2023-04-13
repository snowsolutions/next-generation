<?php

namespace Src\Infrastructure\Laravel\Controllers\Lead;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Src\Application\Lead\Interactors\DeleteInteractor;
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

            return redirect()->route('lead.index');
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('lead.index')]);
        }
    }
}
