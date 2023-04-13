<?php

namespace Src\Application\Campaign\Domains;

use Src\Application\Campaign\Domains\ObjectValues\EndDate;
use Src\Application\Campaign\Domains\ObjectValues\Name;
use Src\Application\Campaign\Domains\ObjectValues\StartDate;

/**
 * Data access object
 */
class Campaign
{
    public function __construct(
        private string $id,
        private Name $name,
        private StartDate $startDate,
        private EndDate $endDate
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
     * @return StartDate
     */
    public function startDate()
    {
        return $this->startDate;
    }

    /**
     * @return EndDate
     */
    public function endDate()
    {
        return $this->endDate;
    }

    public static function create(
        Name $name,
        StartDate $startDate,
        EndDate $endDate
    ) {
        return new self(null, $name, $startDate, $endDate);
    }
}
