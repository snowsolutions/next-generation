<?php

namespace Src\Integrations\Salesforce\Requests\Composite;

class LeadCompositeRequest extends CompositeRequest
{
    public function __construct($params, $method, $id = null)
    {
        parent::__construct('Lead', $params, $method, $id);
    }
}
