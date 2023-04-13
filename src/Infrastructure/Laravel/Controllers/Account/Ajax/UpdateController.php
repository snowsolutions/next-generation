<?php

namespace Src\Infrastructure\Laravel\Controllers\Account\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Src\Application\Account\Interactors\UpdateInteractor;
use Src\Infrastructure\Laravel\Controllers\Response\ApiResponse;

class UpdateController extends Controller
{
    public function __construct(
        private UpdateInteractor $updateInteractor
    ) {
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        try {
            $this->updateInteractor->__invoke($request);

            return ApiResponse::success([], 'Update successfully');
        } catch (\Exception $exception) {
            return ApiResponse::exception($exception->getMessage());
        }
    }
}
