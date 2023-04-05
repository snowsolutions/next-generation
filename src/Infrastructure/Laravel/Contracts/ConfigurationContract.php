<?php

namespace Src\Infrastructure\Laravel\Contracts;

use App\Models\Configuration;
use Illuminate\Support\Collection;

interface ConfigurationContract
{
    public function newInstance(): Configuration;

    public function findByPath($path): Configuration;

    public function findAll(): Collection;

    public function save(Configuration $configuration): void;

    public function update($path, $value): void;

    public function delete($path): void;
}
