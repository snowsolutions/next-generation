<?php

namespace Src\Entities\Campaign\Interactors;

use Src\Entities\Campaign\Domains\Repositories\SalesforceCampaignRepository;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

class ViewInteractor
{
    public function __construct(
        private readonly SalesforceCampaignRepository $salesforceCampaignRepository
    ) {
    }

    public function __invoke($id)
    {
        try {
            $record = $this->salesforceCampaignRepository->findById($id);

            return ControllerResponse::format('campaign.view', ['record' => $record]);
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('lead.view', [$id])]);
        }
    }
}
