<?php

namespace Src\Entities\Campaign\Interactors;

use Illuminate\Http\Request;
use Src\Entities\Campaign\Domains\Repositories\SalesforceCampaignRepository;
use Src\Infrastructure\Laravel\Controller\Response\ApiResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

class UpdateInteractor
{
    public function __construct(
        private readonly SalesforceCampaignRepository $salesforceCampaignRepository
    ) {
    }

    public function __invoke(Request $request)
    {
        $id = $request->get('id');
        $dataToUpdate = $request->get('data');
        try {
            $this->salesforceCampaignRepository->update($id, $dataToUpdate);

            return ApiResponse::success([], 'Update successfully');
        } catch (InvalidSessionIdException|\Exception $exception) {
            return ApiResponse::exception($exception->getMessage());
        }
    }
}
