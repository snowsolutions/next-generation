<?php

namespace Src\Integrations\Salesforce\Repositories\Lead;

use Illuminate\Support\Collection;
use Src\Entities\Lead\Domains\Contracts\LeadRepositoryContract;
use Src\Entities\Lead\Domains\Lead;
use Src\Entities\Lead\Domains\ObjectValues\Company;
use Src\Entities\Lead\Domains\ObjectValues\Email;
use Src\Entities\Lead\Domains\ObjectValues\FirstName;
use Src\Entities\Lead\Domains\ObjectValues\LastName;
use Src\Entities\Lead\Domains\ObjectValues\Phone;
use Src\Integrations\Salesforce\Clients\Composite\LeadCompositeClient;
use Src\Integrations\Salesforce\Clients\SOQL\QueryClient;
use Src\Integrations\Salesforce\Requests\Composite\LeadCompositeRequest;
use Src\Integrations\Salesforce\Requests\SOQL\QueryRequest;
use Src\Integrations\Salesforce\Responses\Composite\LeadCompositeResponse;
use Src\Integrations\Salesforce\Responses\SOQL\LeadSOQLResponse;

//Adapter
class SalesforceLeadRepository implements LeadRepositoryContract
{
    public function __construct(
        private QueryClient $queryClient,
        private LeadCompositeClient $compositeClient
    ) {
    }

    public function findById($id): Lead
    {
        $request = new LeadCompositeRequest([], 'GET', $id);
        $response = $this->compositeClient->call($request);
        $response = new LeadCompositeResponse($response);

        return new Lead(
            $response->Id,
            new FirstName($response->FirstName),
            new LastName($response->LastName),
            new Email($response->Email),
            new Company($response->Company),
            new Phone($response->Phone),
        );
    }

    public function findAll(): Collection
    {
        $request = new QueryRequest('SELECT Id,FirstName,LastName,Email,Company,Phone FROM Lead');
        $response = new LeadSOQLResponse($this->queryClient->call($request));

        return collect(array_map(function ($item) {
            return new Lead(
                $item['Id'],
                new FirstName($item['FirstName']),
                new LastName($item['LastName']),
                new Email($item['Email']),
                new Company($item['Company']),
                new Phone($item['Phone']),
            );
        }, $response->getRecords()));
    }

    public function findTenFirst(): Collection
    {
        $request = new QueryRequest('SELECT Id,FirstName,LastName,Email,Company,Phone FROM Lead LIMIT 10');
        $response = new LeadSOQLResponse($this->queryClient->call($request));

        return collect(array_map(function ($item) {
            return new Lead(
                $item['Id'],
                new FirstName($item['FirstName']),
                new LastName($item['LastName']),
                new Email($item['Email']),
                new Company($item['Company']),
                new Phone($item['Phone']),
            );
        }, $response->getRecords()));
    }

    public function save(Lead $lead): void
    {
        /**
         * TODO with Salesforce API
         */
    }

    public function update($id, $data): void
    {
        $request = new LeadCompositeRequest($data, 'PATCH', $id);
        new LeadCompositeResponse($this->compositeClient->call($request));
    }

    public function delete($id): void
    {
        $request = new LeadCompositeRequest([], 'DELETE', $id);
        new LeadCompositeResponse($this->compositeClient->call($request));
    }
}
