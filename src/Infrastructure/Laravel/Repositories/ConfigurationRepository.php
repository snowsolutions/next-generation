<?php

namespace Src\Infrastructure\Laravel\Repositories;

use App\Models\Configuration;
use Illuminate\Support\Collection;
use Src\Infrastructure\Laravel\Contracts\ConfigurationContract;

class ConfigurationRepository implements ConfigurationContract
{
    public function newInstance(): Configuration
    {
        return new Configuration;
    }

    public function findByPath($path): Configuration
    {
        $record = Configuration::where('path', $path)->first();

        return $record;
    }

    public function findAll(): Collection
    {
        return Configuration::all();
    }

    public function save(Configuration $configuration): void
    {
        $configuration->save();
    }

    public function update($path, $value): void
    {
        $record = $this->findByPath($path);
        $record->path = $path;
        $this->save($record);
    }

    public function delete($path): void
    {
        $record = $this->findByPath($path);
        $record->delete();
    }
}
