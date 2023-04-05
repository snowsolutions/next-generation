<?php

namespace Src\Integrations\Salesforce\Services;

use Illuminate\Http\Request;
use Src\Entities\Campaign\Domains\Contracts\CampaignInsertBulkServiceContract;
use Src\Infrastructure\Laravel\Jobs\UploadCampaignBulkData;

class InsertBulkService implements CampaignInsertBulkServiceContract
{
    public function __invoke(Request $request)
    {
        /**
         * Store the file to public path
         */
        if (! file_exists(public_path('uploads/campaign/csv'))) {
            mkdir(public_path('uploads/campaign/csv'), 0777, true);
        }
        $file = $request->file('upload_csv');
        $uploadFileName = time().'_Batch_Campaign_'.$file->getFilename().'.'.$file->extension();
        $file->move(public_path('uploads/campaign/csv'), $uploadFileName);
        $savedFilePath = public_path('uploads/campaign/csv').'/'.$uploadFileName;
        /**
         * Dispatch the queue to upload the file, the queue will also close the Salesforce job
         */
        UploadCampaignBulkData::dispatch($savedFilePath);
    }
}
