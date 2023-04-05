<?php

namespace Src\Integrations\Salesforce\Responses;

use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

abstract class AbstractResponse
{
    protected bool $isError = false;

    protected string $message;

    protected string $errorCode;

    private const RESPONSE_PROPERTY_MESSAGE = 'message';

    private const RESPONSE_PROPERTY_ERROR_CODE = 'errorCode';

    const RESPONSE_ERROR_INVALID_SESSION_ID = 'INVALID_SESSION_ID';

    protected array $baseResponseFields = [
    ];

    protected array $additionalResponseFields = [
    ];

    public function __construct($rawResponse)
    {
        $this->baseResponseFields = array_merge($this->baseResponseFields, $this->additionalResponseFields);

        if (empty($rawResponse)) {
            return;
        }

        $rawResponse = json_decode($rawResponse, true);

        foreach ($this->baseResponseFields as $baseResponseField) {
            if (array_key_exists($baseResponseField, $rawResponse)) {
                $this->$baseResponseField = $rawResponse[$baseResponseField];
            }
        }

        if (array_key_exists(0, $rawResponse)) {
            if (array_key_exists('errorCode', $rawResponse[0])) {
                $this->isError = true;
                $this->message = $rawResponse[0][self::RESPONSE_PROPERTY_MESSAGE];
                $this->errorCode = $rawResponse[0][self::RESPONSE_PROPERTY_ERROR_CODE];
                throw new InvalidSessionIdException($this->message);
            }
        }
    }
}
