<?php

namespace Src\Entities\Lead\Domains\ObjectValues;

use InvalidArgumentException;

//Object field data
final class Email
{
    private $value;

    /**
     * Field constructor.
     *
     * @throws InvalidArgumentException
     */
    public function __construct($value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    /**
     * @throws InvalidArgumentException
     */
    private function validate($value): void
    {
        if (! empty($value)) {
            if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException(
                    sprintf('%s is not a valid %s. Please try again', $value, Email::class)
                );
            }
        }
    }

    public function value()
    {
        return $this->value;
    }
}
