<?php

namespace Src\Entities\Lead\Domains;

use Src\Entities\Lead\Domains\ObjectValues\Company;
use Src\Entities\Lead\Domains\ObjectValues\Email;
use Src\Entities\Lead\Domains\ObjectValues\FirstName;
use Src\Entities\Lead\Domains\ObjectValues\LastName;
use Src\Entities\Lead\Domains\ObjectValues\Phone;

/**
 * Data access object
 */
class Lead
{
    public function __construct(
        private string $id,
        private FirstName $firstName,
        private LastName $lastName,
        private Email $email,
        private Company $company,
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
     * @return FirstName
     */
    public function firstName()
    {
        return $this->firstName;
    }

    /**
     * @return LastName
     */
    public function lastName()
    {
        return $this->lastName;
    }

    /**
     * @return Email
     */
    public function email()
    {
        return $this->email;
    }

    /**
     * @return Company
     */
    public function company()
    {
        return $this->company;
    }

    /**
     * @return Phone
     */
    public function phone()
    {
        return $this->phone;
    }

    public static function create(
        FirstName $firstName,
        LastName $lastName,
        Email $email,
        Company $company,
        Phone $phone
    ) {
        return new self(null, $firstName, $lastName, $email, $company, $phone);
    }
}
