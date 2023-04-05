<?php

namespace Src\Integrations\Salesforce\Requests;

use Src\Infrastructure\Laravel\Facades\Configuration;

abstract class AbstractRequest implements RequestContract
{
    protected string $requestUrl;

    protected array $headers;

    public function __construct(
        protected $params,
        protected $method = 'GET'
    ) {
        $this->requestUrl = config('salesforce.instance_url').'/services/data/v'.config('salesforce.api_version');
        $this->setAuthorizationHeader();
        $this->setContentTypeHeader();
    }

    public function setRequestUrl($url)
    {
        $this->requestUrl = $url;
    }

    public function setAuthorizationHeader($header = null)
    {
        $this->headers['Authorization'] = $header ?: 'Bearer '.Configuration::getValue('salesforce/credential/access_token');
    }

    public function setContentTypeHeader($header = null)
    {
        $this->headers['Content-Type'] = $header ?: 'application/json';
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
