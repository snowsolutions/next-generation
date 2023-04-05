<?php

namespace Src\Infrastructure\Laravel\Controllers\Campaign\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Src\Entities\Campaign\Interactors\UpdateInteractor;
use Src\Infrastructure\Laravel\Controllers\Response\ApiResponse;
use Src\Integrations\Salesforce\Exceptions\InvalidSessionIdException;

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
        } catch (InvalidSessionIdException|\Exception $exception) {
            return ApiResponse::exception($exception->getMessage());
        }
    }
}
