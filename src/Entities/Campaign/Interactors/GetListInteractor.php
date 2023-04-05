<?php

namespace Src\Entities\Campaign\Interactors;

use Src\Entities\Campaign\Domains\Repositories\SalesforceCampaignRepository;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

class GetListInteractor
{
    public function __construct(
        private readonly SalesforceCampaignRepository $salesforceCampaignRepository
    ) {
    }

    public function __invoke()
    {
        try {
            $records = $this->salesforceCampaignRepository->findTenFirst();

            return ControllerResponse::format('campaign.index', ['records' => $records]);
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('campaign.index')]);
        }
    }
}
