<?php

namespace Src\Entities\Lead\Interactors;

use Src\Entities\Lead\Domains\Contracts\LeadRepositoryContract;

/**
 * Use case
 */
class DeleteInteractor
{
    public function __construct(
        private readonly LeadRepositoryContract $leadRepositoryContract
    ) {
    }

    public function __invoke($id)
    {
        $this->leadRepositoryContract->delete($id);
    }
}
