<?php

namespace Src\Entities\Campaign\Interactors;

use Illuminate\Http\Request;
use Src\Entities\Campaign\Domains\Contracts\CampaignRepositoryContract;
use Src\Infrastructure\Laravel\Controller\Response\ApiResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

/**
 * Use case
 */
class UpdateInteractor
{
    public function __construct(
        private readonly CampaignRepositoryContract $campaignRepositoryContract
    ) {
    }

    public function __invoke(Request $request)
    {
        $id = $request->get('id');
        $dataToUpdate = $request->get('data');
        try {
            $this->campaignRepositoryContract->update($id, $dataToUpdate);

            return ApiResponse::success([], 'Update successfully');
        } catch (InvalidSessionIdException|\Exception $exception) {
            return ApiResponse::exception($exception->getMessage());
        }
    }
}
