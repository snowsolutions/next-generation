<?php

namespace Src\Application\Account\Domains\Contracts;

use Illuminate\Support\Collection;
use Src\Application\Account\Domains\Account;

/**
 * Account repository port
 */
interface AccountRepositoryContract
{
    public function findById($id): Account;

    public function findAll(): Collection;

    public function save(Account $account): void;

    public function update($id, $data): void;

    public function delete($id): void;
}
