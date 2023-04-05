<?php

namespace Src\Entities\Campaign\Interactors;

use Illuminate\Support\Facades\Session;
use Src\Entities\Campaign\Domains\Repositories\SalesforceCampaignRepository;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

class DeleteInteractor
{
    public function __construct(
        private readonly SalesforceCampaignRepository $salesforceCampaignRepository
    ) {
    }

    public function __invoke($id)
    {
        try {
            $this->salesforceCampaignRepository->delete($id);
            Session::flash('success', 'Delete successfully');

            return redirect()->route('campaign.index');
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('campaign.index')]);
        }
    }
}
