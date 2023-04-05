<?php

namespace Src\Entities\Account\Interactors;

use Src\Entities\Account\Domains\Repositories\SalesforceAccountRepository;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

class ViewInteractor
{
    public function __construct(
        private readonly SalesforceAccountRepository $salesforceAccountRepository
    ) {
    }

    public function __invoke($id)
    {
        try {
            $record = $this->salesforceAccountRepository->findById($id);

            return ControllerResponse::format('account.view', ['record' => $record]);
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('account.view', [$id])]);
        }
    }
}
