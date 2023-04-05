<?php

namespace Src\Entities\Lead\Interactors;

use Illuminate\Support\Facades\Session;
use Src\Entities\Lead\Domains\Contracts\LeadRepositoryContract;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

/**
 * Use case
 */
class DeleteInteractor
{
    public function __construct(
        private readonly LeadRepositoryContract $leadRepositoryContract
    ) {
    }

    public function __invoke($id)
    {
        try {
            $this->leadRepositoryContract->delete($id);
            Session::flash('success', 'Delete successfully');

            return redirect()->route('lead.index');
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('lead.index')]);
        }
    }
}
