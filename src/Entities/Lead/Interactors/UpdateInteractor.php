<?php

namespace Src\Entities\Lead\Interactors;

use Illuminate\Http\Request;
use Src\Entities\Lead\Domains\Repositories\SalesforceLeadRepository;
use Src\Infrastructure\Laravel\Controller\Response\ApiResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

class UpdateInteractor
{
    public function __construct(
        private readonly SalesforceLeadRepository $salesforceLeadRepository
    ) {
    }

    public function __invoke(Request $request)
    {
        $id = $request->get('id');
        $dataToUpdate = $request->get('data');
        try {
            $this->salesforceLeadRepository->update($id, $dataToUpdate);

            return ApiResponse::success([], 'Update successfully');
        } catch (InvalidSessionIdException|\Exception $exception) {
            return ApiResponse::exception($exception->getMessage());
        }
    }
}
