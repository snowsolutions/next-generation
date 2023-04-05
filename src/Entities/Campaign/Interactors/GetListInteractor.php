<?php

namespace Src\Entities\Campaign\Interactors;

use Src\Entities\Campaign\Domains\Contracts\CampaignRepositoryContract;

/**
 * Use case
 */
class GetListInteractor
{
    public function __construct(
        private readonly CampaignRepositoryContract $campaignRepositoryContract
    ) {
    }

    public function __invoke()
    {
        return $this->campaignRepositoryContract->findAll();
    }
}
