<?php

namespace Src\Entities\Campaign\Interactors;

use Src\Entities\Campaign\Domains\Contracts\CampaignRepositoryContract;

/**
 * Use case
 */
class ViewInteractor
{
    public function __construct(
        private readonly CampaignRepositoryContract $campaignRepositoryContract
    ) {
    }

    public function __invoke($id)
    {
        return $this->campaignRepositoryContract->findById($id);
    }
}
