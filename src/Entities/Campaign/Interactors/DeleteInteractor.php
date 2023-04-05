<?php

namespace Src\Entities\Campaign\Interactors;

use Src\Entities\Campaign\Domains\Contracts\CampaignRepositoryContract;

/**
 * Use case
 */
class DeleteInteractor
{
    public function __construct(
        private readonly CampaignRepositoryContract $campaignRepositoryContract
    ) {
    }

    public function __invoke($id)
    {
        $this->campaignRepositoryContract->delete($id);
    }
}
