<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Src\Entities\Account\Interactors\ViewInteractor;

class ViewController extends Controller
{
    public function __construct(
        private readonly ViewInteractor $viewInteractor
    ) {
    }

    public function __invoke($id)
    {
        Session::flash('active_nav', 'account.index');

        return $this->viewInteractor->__invoke($id);
    }
}
