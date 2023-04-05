<?php

namespace Src\Integrations\Salesforce\Requests\SOQL;

use Src\Integrations\Salesforce\Requests\AbstractRequest;

class QueryRequest extends AbstractRequest
{
    public function __construct($query)
    {
        /**
         * Replace all space in the query with + character
         */
        $query = str_replace(' ', '+', $query);
        parent::__construct(['q' => $query]);
        $this->requestUrl .= '/query';
    }
}
