<?php

namespace Src\Entities\Account\Interactors;

use Src\Entities\Account\Domains\Contracts\AccountRepositoryContract;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

/**
 * Use case
 */
class ViewInteractor
{
    public function __construct(
        private readonly AccountRepositoryContract $accountRepositoryContract
    ) {
    }

    public function __invoke($id)
    {
        try {
            $record = $this->accountRepositoryContract->findById($id);

            return ControllerResponse::format('account.view', ['record' => $record]);
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('account.view', [$id])]);
        }
    }
}
