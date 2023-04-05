<?php

namespace App\Http\Controllers\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Src\Entities\Campaign\Interactors\InsertBulkInteractor;

class InsertBulkController extends Controller
{
    public function __construct(
        private InsertBulkInteractor $insertBulkInteractor
    ) {
    }

    public function __invoke(Request $request)
    {
        return $this->insertBulkInteractor->__invoke($request);
    }
}
