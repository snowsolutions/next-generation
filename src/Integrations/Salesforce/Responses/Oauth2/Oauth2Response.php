<?php

namespace Src\Integrations\Salesforce\Responses\Oauth2;

use Src\Integrations\Salesforce\Exceptions\Oauth2APIException;

abstract class Oauth2Response
{
    protected bool $isError = false;

    protected string $message;

    protected string $errorCode;

    private const RESPONSE_PROPERTY_MESSAGE = 'error_description';

    private const RESPONSE_PROPERTY_ERROR_CODE = 'error';

    protected array $baseResponseFields = [
    ];

    protected array $additionalResponseFields = [
    ];

    public function __construct($rawResponse)
    {
        $this->baseResponseFields = array_merge($this->baseResponseFields, $this->additionalResponseFields);
        $rawResponse = json_decode($rawResponse, true);

        foreach ($this->baseResponseFields as $baseResponseField) {
            if (array_key_exists($baseResponseField, $rawResponse)) {
                $this->$baseResponseField = $rawResponse[$baseResponseField];
            }
        }

        if (array_key_exists('error', $rawResponse)) {
            $this->isError = true;
            $this->message = $rawResponse[self::RESPONSE_PROPERTY_MESSAGE];
            $this->errorCode = $rawResponse[self::RESPONSE_PROPERTY_ERROR_CODE];
            throw new Oauth2APIException();
        }
    }
}
