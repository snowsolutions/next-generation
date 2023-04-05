<?php

namespace Src\Integrations\Salesforce\Repositories\Account;

use Illuminate\Support\Collection;
use Src\Entities\Account\Domains\Account;
use Src\Entities\Account\Domains\Contracts\AccountRepositoryContract;
use Src\Entities\Account\Domains\ObjectValues\Name;
use Src\Entities\Account\Domains\ObjectValues\Phone;
use Src\Integrations\Salesforce\Clients\Composite\AccountCompositeClient;
use Src\Integrations\Salesforce\Clients\SOQL\QueryClient;
use Src\Integrations\Salesforce\Requests\Composite\AccountCompositeRequest;
use Src\Integrations\Salesforce\Requests\SOQL\QueryRequest;
use Src\Integrations\Salesforce\Responses\Composite\AccountCompositeResponse;
use Src\Integrations\Salesforce\Responses\SOQL\AccountSOQLResponse;

//Adapter
class SalesforceAccountRepository implements AccountRepositoryContract
{
    public function __construct(
        private QueryClient $queryClient,
        private AccountCompositeClient $compositeClient
    ) {
    }

    public function findById($id): Account
    {
        $request = new AccountCompositeRequest([], 'GET', $id);
        $response = $this->compositeClient->call($request);
        $response = new AccountCompositeResponse($response);

        return new Account(
            $response->Id,
            new Name($response->Name),
            new Phone($response->Phone),
        );
    }

    public function findAll(): Collection
    {
        $request = new QueryRequest('SELECT Id,Name,Phone,CreatedDate FROM Account');
        $response = new AccountSOQLResponse($this->queryClient->call($request));

        return collect(array_map(function ($item) {
            return new Account(
                $item['Id'],
                new Name($item['Name']),
                new Phone($item['Phone']),
            );
        }, $response->getRecords()));
    }

    public function findTenFirst(): Collection
    {
        $request = new QueryRequest('SELECT Id,Name,Phone,CreatedDate FROM Account ORDER BY CreatedDate LIMIT 10');
        $response = new AccountSOQLResponse($this->queryClient->call($request));

        return collect(array_map(function ($item) {
            return new Account(
                $item['Id'],
                new Name($item['Name']),
                new Phone($item['Phone']),
            );
        }, $response->getRecords()));
    }

    public function save(Account $account): void
    {
        /**
         * TODO with Salesforce API
         */
    }

    public function update($id, $data): void
    {
        $request = new AccountCompositeRequest($data, 'PATCH', $id);
        $this->compositeClient->call($request);
    }

    public function delete($id): void
    {
        $request = new AccountCompositeRequest([], 'DELETE', $id);
        $this->compositeClient->call($request);
    }
}
