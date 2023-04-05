<?php

namespace Src\Integrations\Salesforce\Responses\Composite;

class LeadCompositeResponse extends AbstractCompositeResponse
{
    protected array $additionalResponseFields = [
        'Id',
        'FirstName',
        'LastName',
        'Email',
        'Company',
        'Phone',
    ];
}
