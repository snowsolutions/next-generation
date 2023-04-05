<?php

namespace Src\Entities\Account\Interactors;

use Illuminate\Support\Facades\Session;
use Src\Entities\Account\Domains\Repositories\SalesforceAccountRepository;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

class DeleteInteractor
{
    public function __construct(
        private readonly SalesforceAccountRepository $salesforceAccountRepository
    ) {
    }

    public function __invoke($id)
    {
        try {
            $this->salesforceAccountRepository->delete($id);
            Session::flash('success', 'Delete successfully');

            return redirect()->route('account.index');
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('account.index')]);
        }
    }
}
