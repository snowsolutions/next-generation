<?php

namespace Src\Application\Account\Interactors;

use Src\Application\Account\Domains\Contracts\AccountRepositoryContract;

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
        return $this->accountRepositoryContract->findTenFirst();
    }
}
