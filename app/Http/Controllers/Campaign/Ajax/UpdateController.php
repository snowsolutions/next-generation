<?php

namespace App\Http\Controllers\Campaign\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Src\Entities\Campaign\Interactors\UpdateInteractor;

class UpdateController extends Controller
{
    public function __construct(
        private UpdateInteractor $updateInteractor
    ) {
    }

    public function __invoke(Request $request)
    {
        return $this->updateInteractor->__invoke($request);
    }
}
