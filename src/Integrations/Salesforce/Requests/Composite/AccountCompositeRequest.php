<?php

namespace Src\Integrations\Salesforce\Requests\Composite;

class AccountCompositeRequest extends CompositeRequest
{
    public function __construct($params, $method, $id = null)
    {
        parent::__construct('Account', $params, $method, $id);
    }
}
