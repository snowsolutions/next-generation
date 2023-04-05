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

    /**
     * @return void
     */
    public function setRequestUrl($url)
    {
        $this->requestUrl = $url;
    }

    /**
     * @return void
     */
    public function setAuthorizationHeader($header = null)
    {
        $this->headers['Authorization'] = $header ?: 'Bearer '.Configuration::getValue('salesforce/credential/access_token');
    }

    /**
     * @return void
     */
    public function setContentTypeHeader($header = null)
    {
        $this->headers['Content-Type'] = $header ?: 'application/json';
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getRequestUrl()
    {
        return $this->requestUrl;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }
}
