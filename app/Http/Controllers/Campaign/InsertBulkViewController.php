<?php

namespace App\Http\Controllers\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Src\Entities\Campaign\Interactors\InsertBulkViewInteractor;

class InsertBulkViewController extends Controller
{
    public function __construct(
        private InsertBulkViewInteractor $insertBulkViewInteractor
    ) {
    }

    public function __invoke()
    {
        Session::flash('active_nav', 'campaign.index');

        return $this->insertBulkViewInteractor->__invoke();
    }
}
