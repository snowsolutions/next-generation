<?php

namespace Src\Entities\Account\Interactors;

use Src\Entities\Account\Domains\Contracts\AccountRepositoryContract;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

/**
 * Use case
 */
class GetListInteractor
{
    public function __construct(
        private readonly AccountRepositoryContract $accountRepositoryContract
    ) {
    }

    public function __invoke()
    {
        try {
            $records = $this->accountRepositoryContract->findTenFirst();

            return ControllerResponse::format('account.index', ['records' => $records]);
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('account.index')]);
        }
    }
}
