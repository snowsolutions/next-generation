<?php

namespace Src\Integrations\Salesforce\Requests\Composite;

class CampaignCompositeRequest extends CompositeRequest
{
    public function __construct($params, $method, $id = null)
    {
        parent::__construct('Campaign', $params, $method, $id);
    }
}
