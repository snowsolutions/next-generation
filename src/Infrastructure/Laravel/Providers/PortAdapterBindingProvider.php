<?php

namespace Src\Infrastructure\Laravel\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Src\Application\Account\Domains\Contracts\AccountRepositoryContract;
use Src\Application\Account\Interactors\DeleteInteractor as AccountDeleteInteractor;
use Src\Application\Account\Interactors\GetListInteractor as AccountGetListInteractor;
use Src\Application\Account\Interactors\UpdateInteractor as AccountUpdateInteractor;
use Src\Application\Account\Interactors\ViewInteractor as AccountViewInteractor;
use Src\Application\Campaign\Domains\Contracts\CampaignInsertBulkServiceContract;
use Src\Application\Campaign\Domains\Contracts\CampaignRepositoryContract;
use Src\Application\Campaign\Interactors\DeleteInteractor as CampaignDeleteInteractor;
use Src\Application\Campaign\Interactors\GetListInteractor as CampaignGetListInteractor;
use Src\Application\Campaign\Interactors\InsertBulkInteractor as CampaignInsertBulkInteractor;
use Src\Application\Campaign\Interactors\UpdateInteractor as CampaignUpdateInteractor;
use Src\Application\Campaign\Interactors\ViewInteractor as CampaignViewInteractor;
use Src\Application\Lead\Domains\Contracts\LeadRepositoryContract;
use Src\Application\Lead\Interactors\DeleteInteractor as LeadDeleteInteractor;
use Src\Application\Lead\Interactors\GetListInteractor as LeadGetListInteractor;
use Src\Application\Lead\Interactors\UpdateInteractor as LeadUpdateInteractor;
use Src\Application\Lead\Interactors\ViewInteractor as LeadViewInteractor;
use Src\Integrations\Salesforce\Repositories\Account\SalesforceAccountRepository;
use Src\Integrations\Salesforce\Repositories\Campaign\SalesforceCampaignRepository;
use Src\Integrations\Salesforce\Repositories\Lead\SalesforceLeadRepository;
use Src\Integrations\Salesforce\Services\InsertBulkService;

class PortAdapterBindingProvider extends ServiceProvider
{
    /**
     * Binding resolution for Ports & Adapters
     */
    public function register(): void
    {
        /**
         * Port - Adapter Account
         */
        App::when(AccountGetListInteractor::class)->needs(AccountRepositoryContract::class)->give(SalesforceAccountRepository::class);
        App::when(AccountViewInteractor::class)->needs(AccountRepositoryContract::class)->give(SalesforceAccountRepository::class);
        App::when(AccountDeleteInteractor::class)->needs(AccountRepositoryContract::class)->give(SalesforceAccountRepository::class);
        App::when(AccountUpdateInteractor::class)->needs(AccountRepositoryContract::class)->give(SalesforceAccountRepository::class);

        /**
         * Port - Adapter Lead
         */
        App::when(LeadGetListInteractor::class)->needs(LeadRepositoryContract::class)->give(SalesforceLeadRepository::class);
        App::when(LeadViewInteractor::class)->needs(LeadRepositoryContract::class)->give(SalesforceLeadRepository::class);
        App::when(LeadDeleteInteractor::class)->needs(LeadRepositoryContract::class)->give(SalesforceLeadRepository::class);
        App::when(LeadUpdateInteractor::class)->needs(LeadRepositoryContract::class)->give(SalesforceLeadRepository::class);

        /**
         * Port - Adapter Campaign
         */
        App::when(CampaignGetListInteractor::class)->needs(CampaignRepositoryContract::class)->give(SalesforceCampaignRepository::class);
        App::when(CampaignViewInteractor::class)->needs(CampaignRepositoryContract::class)->give(SalesforceCampaignRepository::class);
        App::when(CampaignDeleteInteractor::class)->needs(CampaignRepositoryContract::class)->give(SalesforceCampaignRepository::class);
        App::when(CampaignUpdateInteractor::class)->needs(CampaignRepositoryContract::class)->give(SalesforceCampaignRepository::class);
        App::when(CampaignInsertBulkInteractor::class)->needs(CampaignInsertBulkServiceContract::class)->give(InsertBulkService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
