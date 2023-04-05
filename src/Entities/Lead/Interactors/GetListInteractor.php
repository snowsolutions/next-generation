<?php

namespace Src\Entities\Lead\Interactors;

use Src\Entities\Lead\Domains\Repositories\SalesforceLeadRepository;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

class GetListInteractor
{
    public function __construct(
        private readonly SalesforceLeadRepository $salesforceLeadRepository
    ) {
    }

    public function __invoke()
    {
        try {
            $records = $this->salesforceLeadRepository->findTenFirst();

            return ControllerResponse::format('lead.index', ['records' => $records]);
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('lead.index')]);
        }
    }
}
