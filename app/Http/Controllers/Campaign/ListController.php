<?php

namespace App\Http\Controllers\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Src\Entities\Campaign\Interactors\GetListInteractor;

class ListController extends Controller
{
    public function __construct(
        private GetListInteractor $getListInteractor
    ) {
    }

    public function __invoke()
    {
        Session::flash('active_nav', 'campaign.index');

        return $this->getListInteractor->__invoke();
    }
}
