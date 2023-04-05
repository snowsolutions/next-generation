<?php

namespace Src\Integrations\Salesforce\Repositories\Campaign;

use Illuminate\Support\Collection;
use Src\Entities\Campaign\Domains\Campaign;
use Src\Entities\Campaign\Domains\Contracts\CampaignRepositoryContract;
use Src\Entities\Campaign\Domains\ObjectValues\EndDate;
use Src\Entities\Campaign\Domains\ObjectValues\Name;
use Src\Entities\Campaign\Domains\ObjectValues\StartDate;
use Src\Integrations\Salesforce\Clients\Composite\CampaignCompositeClient;
use Src\Integrations\Salesforce\Clients\SOQL\QueryClient;
use Src\Integrations\Salesforce\Requests\Composite\CampaignCompositeRequest;
use Src\Integrations\Salesforce\Requests\SOQL\QueryRequest;
use Src\Integrations\Salesforce\Responses\Composite\CampaignCompositeResponse;
use Src\Integrations\Salesforce\Responses\SOQL\CampaignSOQLResponse;

//Adapter
class SalesforceCampaignRepository implements CampaignRepositoryContract
{
    public function __construct(
        private QueryClient $queryClient,
        private CampaignCompositeClient $compositeClient
    ) {
    }

    public function findById($id): Campaign
    {
        $request = new CampaignCompositeRequest([], 'GET', $id);
        $response = $this->compositeClient->call($request);
        $response = new CampaignCompositeResponse($response);

        return new Campaign(
            $response->Id,
            new Name($response->Name),
            new StartDate($response->StartDate),
            new EndDate($response->EndDate),
        );
    }

    public function findAll(): Collection
    {
        $request = new QueryRequest('SELECT Id,Name,StartDate,EndDate,CreatedDate FROM Campaign');
        $response = new CampaignSOQLResponse($this->queryClient->call($request));

        return collect(array_map(function ($item) {
            return new Campaign(
                $item['Id'],
                new Name($item['Name']),
                new StartDate($item['StartDate']),
                new EndDate($item['EndDate']),
            );
        }, $response->getRecords()));
    }

    public function findTenFirst(): Collection
    {
        $request = new QueryRequest('SELECT Id,Name,StartDate,EndDate,CreatedDate FROM Campaign ORDER BY CreatedDate DESC LIMIT 10');
        $response = new CampaignSOQLResponse($this->queryClient->call($request));

        return collect(array_map(function ($item) {
            return new Campaign(
                $item['Id'],
                new Name($item['Name']),
                new StartDate($item['StartDate']),
                new EndDate($item['EndDate']),
            );
        }, $response->getRecords()));
    }

    public function save(Campaign $campaign): void
    {
        /**
         * TODO with Salesforce API
         */
    }

    public function update($id, $data): void
    {
        $request = new CampaignCompositeRequest($data, 'PATCH', $id);
        new CampaignCompositeResponse($this->compositeClient->call($request));
    }

    public function delete($id): void
    {
        $request = new CampaignCompositeRequest([], 'DELETE', $id);
        new CampaignCompositeResponse($this->compositeClient->call($request));
    }
}
