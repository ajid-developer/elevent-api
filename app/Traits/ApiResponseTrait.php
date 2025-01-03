<?php

namespace App\Traits;

/*
|--------------------------------------------------------------------------
| Api Responses Trait
|--------------------------------------------------------------------------
|
| This trait will be used for any response we sent to clients.
|
*/

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    protected function success(array $data = null, int $code = 200): JsonResponse
    {
        $response = config('rc.successfully');
        $response['data'] = $data;

        return response()->json($response, $code);
    }

    protected function createSuccess(array $data = null, int $code = 201): JsonResponse
    {
        $response = config('rc.create_successfully');
        $response['data'] = $data;

        return response()->json($response, $code);
    }
}
