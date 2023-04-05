<?php

namespace Src\Entities\Lead\Interactors;

use Src\Entities\Lead\Domains\Contracts\LeadRepositoryContract;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

/**
 * Use case
 */
class GetListInteractor
{
    public function __construct(
        private readonly LeadRepositoryContract $leadRepositoryContract
    ) {
    }

    public function __invoke()
    {
        try {
            $records = $this->leadRepositoryContract->findTenFirst();

            return ControllerResponse::format('lead.index', ['records' => $records]);
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('lead.index')]);
        }
    }
}
