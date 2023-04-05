<?php

namespace Src\Entities\Lead\Domains;

//Object factory

use Src\Entities\Lead\Domains\ObjectValues\Company;
use Src\Entities\Lead\Domains\ObjectValues\Email;
use Src\Entities\Lead\Domains\ObjectValues\FirstName;
use Src\Entities\Lead\Domains\ObjectValues\LastName;
use Src\Entities\Lead\Domains\ObjectValues\Phone;

class LeadFactory
{
    public static function create(): Lead
    {
        return new Lead(
            new FirstName('Frank'),
            new LastName('Nguyen'),
            new Email('phucnguyen.snow@gmail.com'),
            new Company('MyCompany'),
            new Phone('1236456789')
        );
    }
}
