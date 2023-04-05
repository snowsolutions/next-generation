<?php

namespace Src\Entities\Campaign\Domains\Contracts;

use Illuminate\Support\Collection;
use Src\Entities\Campaign\Domains\Campaign;

/**
 * Campaign repository port
 */
interface CampaignRepositoryContract
{
    public function findById($id): Campaign;

    public function findAll(): Collection;

    public function save(Campaign $campaign): void;

    public function update($id, $data): void;

    public function delete($id): void;
}
