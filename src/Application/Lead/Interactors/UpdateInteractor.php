<?php

namespace Src\Application\Lead\Interactors;

use Illuminate\Http\Request;
use Src\Application\Lead\Domains\Contracts\LeadRepositoryContract;

/**
 * Use case
 */
class UpdateInteractor
{
    public function __construct(
        private readonly LeadRepositoryContract $leadRepositoryContract
    ) {
    }

    public function __invoke(Request $request)
    {
        $id = $request->get('id');
        $dataToUpdate = $request->get('data');
        $this->leadRepositoryContract->update($id, $dataToUpdate);
    }
}
