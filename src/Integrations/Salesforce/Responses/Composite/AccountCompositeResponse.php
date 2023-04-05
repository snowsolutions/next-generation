<?php

namespace Src\Integrations\Salesforce\Responses\Composite;

class AccountCompositeResponse extends AbstractCompositeResponse
{
    protected array $additionalResponseFields = [
        'Id',
        'Name',
        'Phone',
    ];
}
