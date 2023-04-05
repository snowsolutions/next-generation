<?php

namespace Src\Entities\Lead\Interactors;

use Src\Entities\Lead\Domains\Contracts\LeadRepositoryContract;

/**
 * Use case
 */
class GetListInteractor
{
    public function __construct(
        private readonly LeadRepositoryContract $leadRepositoryContract
    ) {
    }

    public function __invoke()
    {
        return $this->leadRepositoryContract->findAll();
    }
}
