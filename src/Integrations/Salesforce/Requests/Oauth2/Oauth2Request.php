<?php

namespace Src\Integrations\Salesforce\Requests\Oauth2;

use Src\Integrations\Salesforce\Requests\RequestContract;

class Oauth2Request implements RequestContract
{
    protected string $requestUrl;

    protected array $headers;

    public function __construct(
        protected $params,
        protected $method = 'GET'
    ) {
        $this->requestUrl = config('salesforce.auth_url').'/services/oauth2/token';
        $this->setContentTypeHeader();
    }

    public function setRequestUrl($url)
    {
        $this->requestUrl = $url;
    }

    public function setContentTypeHeader($header = null)
    {
        $this->headers['Content-Type'] = $header ?: 'application/x-www-form-urlencoded';
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getRequestUrl()
    {
        return $this->requestUrl;
    }

    public function getParams()
    {
        return $this->params;
    }
}
