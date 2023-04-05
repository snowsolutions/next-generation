<?php

namespace Src\Infrastructure\Laravel\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Src\Integrations\Salesforce\Clients\Bulk\BulkClient;
use Src\Integrations\Salesforce\Requests\Bulk\CampaignBulkRequest;
use Src\Integrations\Salesforce\Responses\Bulk\CampaignBulkResponse;

class UploadCampaignBulkData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private readonly string $savedFilePath
    ) {
    }

    public function handle(
        BulkClient $client
    ): void {
        /**
         * Create a Salesforce Job
         */
        $createJobRequest = new CampaignBulkRequest([
            'object' => 'Campaign',
            'operation' => 'insert',
            'lineEnding' => 'CRLF',
        ], 'POST');

        $createResponse = new CampaignBulkResponse($client->call($createJobRequest));

        /**
         * Upload file to Salesforce Job
         */
        $jobId = $createResponse->getId();
        $fileContent = file_get_contents($this->savedFilePath);
        $uploadBulkDataRequest = new CampaignBulkRequest($fileContent, 'PUT', '/'.$jobId.'/batches');
        $uploadBulkDataRequest->setContentTypeHeader('text/csv');
        new CampaignBulkResponse($client->call($uploadBulkDataRequest));
        /**
         * Close Salesforce Job
         */
        $closeJobRequest = new CampaignBulkRequest(['state' => 'UploadComplete'], 'PATCH', '/'.$jobId);
        $closeJobRequest->setContentTypeHeader('application/json');
        $closeJobResponse = new CampaignBulkResponse($client->call($closeJobRequest));
        print_r($closeJobResponse);
    }
}
