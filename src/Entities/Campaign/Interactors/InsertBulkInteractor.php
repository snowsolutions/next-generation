<?php

namespace Src\Entities\Campaign\Interactors;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Src\Entities\Campaign\Domains\Services\InsertBulkService;
use Src\Infrastructure\Laravel\Controller\Response\ControllerResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

class InsertBulkInteractor
{
    public function __construct(
        private readonly InsertBulkService $insertBulkService
    ) {
    }

    public function __invoke(Request $request)
    {
        try {
            $request->validate([
                'upload_csv' => 'required|mimes:csv|max:10000',
            ]);
            if ($request->hasFile('upload_csv')) {
                $this->insertBulkService->__invoke($request);
                Session::flash('success', 'The bulk data has been queued and will be process underground');
            }

            return redirect()->route('campaign.bulk.insert_view');
        } catch (InvalidSessionIdException $exception) {
            return ControllerResponse::format('auth.expired_token', ['prevUrl' => route('campaign.bulk.insert_view')]);
        }
    }
}
