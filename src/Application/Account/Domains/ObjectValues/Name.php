<?php

namespace Src\Application\Account\Domains\ObjectValues;

use InvalidArgumentException;

//Object field data
final class Name
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
        if (empty($value)) {
            throw new InvalidArgumentException(
                sprintf('<%s> must not be empty', Name::class)
            );
        }
    }

    public function value()
    {
        return $this->value;
    }
}
