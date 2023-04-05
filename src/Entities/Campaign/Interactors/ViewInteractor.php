<?php

namespace Src\Entities\Campaign\Interactors;

use Src\Entities\Campaign\Domains\Contracts\CampaignRepositoryContract;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

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
        try {
            $record = $this->campaignRepositoryContract->findById($id);

            return ControllerResponse::format('campaign.view', ['record' => $record]);
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('lead.view', [$id])]);
        }
    }
}
