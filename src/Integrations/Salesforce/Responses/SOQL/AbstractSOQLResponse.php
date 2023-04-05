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

    /**
     * @return mixed
     */
    public function getTotalSize()
    {
        return $this->{self::RESPONSE_PROPERTY_TOTAL_SIZE};
    }

    /**
     * @return mixed
     */
    public function getDone()
    {
        return $this->{self::RESPONSE_PROPERTY_DONE};
    }

    /**
     * @return mixed
     */
    public function getRecords()
    {
        return $this->{self::RESPONSE_PROPERTY_RECORDS};
    }

    /**
     * @return mixed|string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return mixed|string
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }
}
