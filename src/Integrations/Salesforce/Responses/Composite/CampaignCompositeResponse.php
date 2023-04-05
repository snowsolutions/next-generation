<?php

namespace Src\Integrations\Salesforce\Responses\Composite;

class CampaignCompositeResponse extends AbstractCompositeResponse
{
    protected array $additionalResponseFields = [
        'Id',
        'Name',
        'StartDate',
        'EndDate',
    ];
}
