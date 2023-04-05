<?php

namespace Src\Infrastructure\Laravel\Helpers;

use Illuminate\Support\Facades\DB;
use Src\Infrastructure\Laravel\Repositories\ConfigurationRepository;

class Configuration
{
    public function __construct(
        private ConfigurationRepository $configurationRepository
    ) {
    }

    public function getValue($path, $useDbHelper = false)
    {
        if (! $useDbHelper) {
            $record = $this->configurationRepository->findByPath($path);
            if ($record) {
                return $record->value;
            }

            return false;
        } else {
            $record = DB::table('configurations')->where('path', $path)->first();
            if (! is_null($record)) {
                return $record->value;
            }

            return false;
        }
    }

    public function set($path, $value, $useDbHelper = false)
    {
        if (! $useDbHelper) {
            $record = $this->configurationRepository->findByPath($path);
            if (! $record) {
                $record = $this->configurationRepository->newInstance();
            }
            $record->path = $path;
            $record->value = $value;
            $this->configurationRepository->save($record);
        } else {
            $record = DB::table('configurations')->where('path', $path)->first();
            if (! $record) {
                DB::table('configurations')->insert([
                    'path' => $path,
                    'value' => $value,
                ]);
            }
        }
    }
}
