<?php

namespace Src\Entities\Campaign\Domains\ObjectValues;

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
    }

    public function value()
    {
        return $this->value;
    }
}
