<?php

namespace Src\Entities\Account\Domains;

use Src\Entities\Account\Domains\ObjectValues\Name;
use Src\Entities\Account\Domains\ObjectValues\Phone;

/**
 * Data access object
 */
class Account
{
    public function __construct(
        private string $id,
        private Name $name,
        private Phone $phone
    ) {
    }

    /**
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return Name
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return Phone
     */
    public function phone()
    {
        return $this->phone;
    }

    /**
     * @return Account
     */
    public static function create(
        Name $name,
        Phone $phone
    ) {
        return new self(null, $name, $phone);
    }
}
