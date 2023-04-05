<?php

namespace Src\Integrations\Salesforce\Requests\Bulk;

use Src\Integrations\Salesforce\Requests\AbstractRequest;

class BulkRequest extends AbstractRequest
{
    public function __construct($params = [], $method = 'GET', $suffix = '')
    {
        parent::__construct($params, $method);
        $this->requestUrl .= '/jobs/ingest'.$suffix;
    }
}
