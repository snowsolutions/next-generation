<?php

namespace Src\Application\Account\Interactors;

use Src\Application\Account\Domains\Contracts\AccountRepositoryContract;

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
        return $this->accountRepositoryContract->findById($id);
    }
}
