<?php

namespace Src\Integrations\Salesforce\Responses\SOQL;

use Src\Integrations\Salesforce\Responses\AbstractResponse;

abstract class AbstractSOQLResponse extends AbstractResponse
{
    private const RESPONSE_PROPERTY_TOTAL_SIZE = 'totalSize';

    private const RESPONSE_PROPERTY_DONE = 'done';

    private const RESPONSE_PROPERTY_RECORDS = 'records';

    protected array $baseResponseFields = [
        self::RESPONSE_PROPERTY_TOTAL_SIZE,
        self::RESPONSE_PROPERTY_DONE,
        self::RESPONSE_PROPERTY_RECORDS,
    ];

    public function getTotalSize()
    {
        return $this->{self::RESPONSE_PROPERTY_TOTAL_SIZE};
    }

    public function getDone()
    {
        return $this->{self::RESPONSE_PROPERTY_DONE};
    }

    public function getRecords()
    {
        return $this->{self::RESPONSE_PROPERTY_RECORDS};
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }
}
