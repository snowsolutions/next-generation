<?php

namespace Src\Application\Campaign\Interactors;

use Src\Application\Campaign\Domains\Contracts\CampaignRepositoryContract;

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
