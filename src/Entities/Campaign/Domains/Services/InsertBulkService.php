<?php

namespace Src\Entities\Campaign\Domains\Services;

use Illuminate\Http\Request;
use Src\Infrastructure\Laravel\Jobs\UploadCampaignBulkData;

class InsertBulkService
{
    public function __invoke(Request $request)
    {
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
