<?php

namespace Src\Integrations\Salesforce\Requests\Oauth2;

class RequestAccessTokenRequest extends Oauth2Request
{
    public function __construct($params, $method = 'GET')
    {
        $this->params = $params;
        $this->method = $method;
        parent::__construct($params, $method);
        $this->headers['Connection'] = 'keep-alive';
        $this->headers['Accept'] = '*/*';
    }
}
