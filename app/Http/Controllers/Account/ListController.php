<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Src\Entities\Account\Interactors\GetListInteractor;

class ListController extends Controller
{
    public function __construct(
        private GetListInteractor $getListInteractor
    ) {
    }

    public function __invoke()
    {
        Session::flash('active_nav', 'account.index');

        return $this->getListInteractor->__invoke();
    }
}
