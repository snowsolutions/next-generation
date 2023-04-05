<?php

namespace Src\Entities\Lead\Interactors;

use Src\Entities\Lead\Domains\Repositories\SalesforceLeadRepository;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

class ViewInteractor
{
    public function __construct(
        private readonly SalesforceLeadRepository $salesforceLeadRepository
    ) {
    }

    public function __invoke($id)
    {
        try {
            $record = $this->salesforceLeadRepository->findById($id);

            return ControllerResponse::format('lead.view', ['record' => $record]);
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('lead.view', [$id])]);
        }
    }
}
