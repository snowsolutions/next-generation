<?php

namespace Src\Entities\Account\Interactors;

use Src\Entities\Account\Domains\Contracts\AccountRepositoryContract;

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
