<?php

namespace Src\Infrastructure\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class Configuration extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Src\Infrastructure\Laravel\Helpers\Configuration::class;
    }
}
