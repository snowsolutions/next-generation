<?php

namespace Src\Application\Lead\Domains\Contracts;

use Illuminate\Support\Collection;
use Src\Application\Lead\Domains\Lead;

/**
 * Lead repository port
 */
interface LeadRepositoryContract
{
    public function findById($id): Lead;

    public function findAll(): Collection;

    public function save(Lead $lead): void;

    public function update($id, $data): void;

    public function delete($id): void;
}
