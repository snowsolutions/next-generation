<?php

namespace Src\Entities\Lead\Interactors;

use Illuminate\Http\Request;
use Src\Entities\Lead\Domains\Contracts\LeadRepositoryContract;
use Src\Infrastructure\Laravel\Controller\Response\ApiResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

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
        try {
            $this->leadRepositoryContract->update($id, $dataToUpdate);

            return ApiResponse::success([], 'Update successfully');
        } catch (InvalidSessionIdException|\Exception $exception) {
            return ApiResponse::exception($exception->getMessage());
        }
    }
}
