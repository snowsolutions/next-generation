<?php

namespace Src\Integrations\Salesforce\Responses\Composite;

use Src\Integrations\Salesforce\Responses\AbstractResponse;

abstract class AbstractCompositeResponse extends AbstractResponse
{
    private const RESPONSE_PROPERTY_ID = 'id';

    private const RESPONSE_PROPERTY_SUCCESS = 'success';

    private const RESPONSE_PROPERTY_ERRORS = 'errors';

    private const RESPONSE_PROPERTY_FIELDS = 'fields';

    protected array $baseResponseFields = [
        self::RESPONSE_PROPERTY_ID,
        self::RESPONSE_PROPERTY_SUCCESS,
        self::RESPONSE_PROPERTY_ERRORS,
        self::RESPONSE_PROPERTY_FIELDS,
    ];

    public function __construct($rawResponse)
    {
        parent::__construct($rawResponse);
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
