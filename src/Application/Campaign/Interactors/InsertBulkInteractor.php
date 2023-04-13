<?php

namespace Src\Application\Campaign\Interactors;

use Illuminate\Http\Request;
use Src\Application\Campaign\Domains\Contracts\CampaignInsertBulkServiceContract;

/**
 * Use case
 */
class InsertBulkInteractor
{
    public function __construct(
        private readonly CampaignInsertBulkServiceContract $campaignInsertBulkServiceContract
    ) {
    }

    public function __invoke(Request $request)
    {
        $request->validate([
            'upload_csv' => 'required|mimes:csv|max:10000',
        ]);
        if ($request->hasFile('upload_csv')) {
            $this->campaignInsertBulkServiceContract->__invoke($request);
        }
    }
}
