<?php

namespace Src\Entities\Lead\Interactors;

use Src\Entities\Lead\Domains\Contracts\LeadRepositoryContract;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

/**
 * Use case
 */
class ViewInteractor
{
    public function __construct(
        private readonly LeadRepositoryContract $leadRepositoryContract
    ) {
    }

    public function __invoke($id)
    {
        try {
            $record = $this->leadRepositoryContract->findById($id);

            return ControllerResponse::format('lead.view', ['record' => $record]);
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('lead.view', [$id])]);
        }
    }
}
