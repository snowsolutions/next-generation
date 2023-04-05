<?php

namespace Src\Entities\Campaign\Interactors;

use Illuminate\Http\Request;
use Src\Entities\Campaign\Domains\Contracts\CampaignRepositoryContract;

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
        $this->campaignRepositoryContract->update($id, $dataToUpdate);
    }
}
