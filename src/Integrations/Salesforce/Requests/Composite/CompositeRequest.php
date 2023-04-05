<?php

namespace Src\Integrations\Salesforce\Requests\Composite;

use Src\Integrations\Salesforce\Requests\AbstractRequest;

class CompositeRequest extends AbstractRequest
{
    public function __construct($object, $params, $method, $id = null)
    {
        parent::__construct($params, $method);
        $this->requestUrl .= "/sobjects/$object";
        if ($id) {
            $this->requestUrl .= "/$id";
        }
    }
}
