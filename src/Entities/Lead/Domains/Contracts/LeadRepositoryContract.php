<?php

namespace Src\Entities\Lead\Domains\Contracts;

use Illuminate\Support\Collection;
use Src\Entities\Lead\Domains\Lead;

//Port
interface LeadRepositoryContract
{
    public function findById($id): Lead;

    public function findAll(): Collection;

    public function save(Lead $lead): void;

    public function update($id, $data): void;

    public function delete($id): void;
}
