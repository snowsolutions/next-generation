<?php

namespace App\Http\Controllers\Lead;

use App\Http\Controllers\Controller;
use Src\Entities\Lead\Interactors\DeleteInteractor;

class DeleteController extends Controller
{
    public function __construct(
        private DeleteInteractor $deleteInteractor
    ) {
    }

    public function __invoke($id)
    {
        return $this->deleteInteractor->__invoke($id);
    }
}
