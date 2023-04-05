<?php

namespace Src\Integrations\Salesforce\Responses\Bulk;

use Src\Integrations\Salesforce\Responses\AbstractResponse;

abstract class AbstractBulkResponse extends AbstractResponse
{
    private const RESPONSE_PROPERTY_ID = 'id';

    private const RESPONSE_PROPERTY_STATE = 'state';

    private const RESPONSE_PROPERTY_OBJECT = 'object';

    private const RESPONSE_PROPERTY_LINE_ENDING = 'lineEnding';

    private const RESPONSE_PROPERTY_COLUMN_DELIMITER = 'columnDelimiter';

    protected array $baseResponseFields = [
        self::RESPONSE_PROPERTY_ID,
        self::RESPONSE_PROPERTY_STATE,
        self::RESPONSE_PROPERTY_OBJECT,
        self::RESPONSE_PROPERTY_LINE_ENDING,
        self::RESPONSE_PROPERTY_COLUMN_DELIMITER,
    ];

    public function __construct($rawResponse)
    {
        parent::__construct($rawResponse);
    }

    public function getId()
    {
        return $this->{self::RESPONSE_PROPERTY_ID};
    }

    public function getState()
    {
        return $this->{self::RESPONSE_PROPERTY_STATE};
    }

    public function getObject()
    {
        return $this->{self::RESPONSE_PROPERTY_OBJECT};
    }

    public function getLineEnding()
    {
        return $this->{self::RESPONSE_PROPERTY_LINE_ENDING};
    }

    public function getDelimiter()
    {
        return $this->{self::RESPONSE_PROPERTY_COLUMN_DELIMITER};
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
