<?php

namespace App\Http\Controllers\Account\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Src\Entities\Account\Interactors\UpdateInteractor;

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
