<?php

namespace Src\Entities\Account\Interactors;

use Illuminate\Http\Request;
use Src\Entities\Account\Domains\Contracts\AccountRepositoryContract;
use Src\Infrastructure\Laravel\Controller\Response\ApiResponse;

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
        try {
            $this->accountRepositoryContract->update($id, $dataToUpdate);

            return ApiResponse::success([], 'Update successfully');
        } catch (\Exception $exception) {
            return ApiResponse::exception($exception->getMessage());
        }
    }
}
