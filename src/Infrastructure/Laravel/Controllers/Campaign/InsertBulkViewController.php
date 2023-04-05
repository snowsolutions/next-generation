<?php

namespace Src\Infrastructure\Laravel\Controllers\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Src\Entities\Campaign\Interactors\InsertBulkViewInteractor;
use Src\Infrastructure\Laravel\Controllers\Response\ControllerResponse;

class InsertBulkViewController extends Controller
{
    public function __construct(
        private InsertBulkViewInteractor $insertBulkViewInteractor
    ) {
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        Session::flash('active_nav', 'campaign.index');

        $this->insertBulkViewInteractor->__invoke();

        return ControllerResponse::format('campaign.bulk_insert');
    }
}
