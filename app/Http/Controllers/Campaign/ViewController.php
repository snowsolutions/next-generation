<?php

namespace App\Http\Controllers\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Src\Entities\Campaign\Interactors\ViewInteractor;

class ViewController extends Controller
{
    public function __construct(
        private ViewInteractor $viewInteractor
    ) {
    }

    public function __invoke($id)
    {
        Session::flash('active_nav', 'campaign.index');

        return $this->viewInteractor->__invoke($id);
    }
}
