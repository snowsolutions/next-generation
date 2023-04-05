<?php

namespace Src\Entities\Lead\Interactors;

use Src\Entities\Lead\Domains\Contracts\LeadRepositoryContract;

/**
 * Use case
 */
class ViewInteractor
{
    public function __construct(
        private readonly LeadRepositoryContract $leadRepositoryContract
    ) {
    }

    public function __invoke($id)
    {
        return $this->leadRepositoryContract->findById($id);
    }
}
