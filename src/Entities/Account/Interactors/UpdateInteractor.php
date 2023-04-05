<?php

namespace Src\Entities\Account\Interactors;

use Illuminate\Http\Request;
use Src\Entities\Account\Domains\Repositories\SalesforceAccountRepository;
use Src\Infrastructure\Laravel\Controller\Response\ApiResponse;

class UpdateInteractor
{
    public function __construct(
        private readonly SalesforceAccountRepository $salesforceAccountRepository
    ) {
    }

    public function __invoke(Request $request)
    {
        $id = $request->get('id');
        $dataToUpdate = $request->get('data');
        try {
            $this->salesforceAccountRepository->update($id, $dataToUpdate);

            return ApiResponse::success([], 'Update successfully');
        } catch (\Exception $exception) {
            return ApiResponse::exception($exception->getMessage());
        }
    }
}
