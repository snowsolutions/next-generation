<?php

namespace Src\Infrastructure\Laravel\Controllers\Response;

class ControllerResponse
{
    public function __construct(

    ) {
    }

    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string|null  $view
     * @param  \Illuminate\Contracts\Support\Arrayable|array  $data
     * @param  array  $mergeData
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public static function format($view = null, $data = [], $mergeData = [])
    {
        return view($view, $data, $mergeData);
    }
}
