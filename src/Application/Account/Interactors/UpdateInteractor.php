<?php

namespace Src\Application\Account\Interactors;

use Illuminate\Http\Request;
use Src\Application\Account\Domains\Contracts\AccountRepositoryContract;

/**
 * Use case
 */
class UpdateInteractor
{
    public function __construct(
        private readonly AccountRepositoryContract $accountRepositoryContract
    ) {
    }

    public function __invoke(Request $request)
    {
        $id = $request->get('id');
        $dataToUpdate = $request->get('data');
        $this->accountRepositoryContract->update($id, $dataToUpdate);
    }
}
