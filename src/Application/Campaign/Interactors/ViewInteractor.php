<?php

namespace Src\Application\Campaign\Interactors;

use Src\Application\Campaign\Domains\Contracts\CampaignRepositoryContract;

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
