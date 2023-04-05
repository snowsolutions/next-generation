<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Src\Entities\Lead\Interactors\GetListInteractor;

class ListController extends Controller
{
    public function __construct(
        private GetListInteractor $getListInteractor
    ) {
    }

    public function __invoke()
    {
        Session::flash('active_nav', 'lead.index');

        return $this->getListInteractor->__invoke();
    }
}
