<?php

namespace Src\Entities\Campaign\Interactors;

use Src\Entities\Campaign\Domains\Contracts\CampaignRepositoryContract;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

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
        try {
            $records = $this->campaignRepositoryContract->findTenFirst();

            return ControllerResponse::format('campaign.index', ['records' => $records]);
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('campaign.index')]);
        }
    }
}
