<?php

namespace Src\Entities\Account\Interactors;

use Src\Entities\Account\Domains\Repositories\SalesforceAccountRepository;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

class GetListInteractor
{
    public function __construct(
        private readonly SalesforceAccountRepository $salesforceAccountRepository
    ) {
    }

    public function __invoke()
    {
        try {
            $records = $this->salesforceAccountRepository->findTenFirst();

            return ControllerResponse::format('account.index', ['records' => $records]);
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('account.index')]);
        }
    }
}
