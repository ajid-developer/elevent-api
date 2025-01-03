<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\User\UserService;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Request;

class AuthController
{
    use ApiResponseTrait;

    protected UserService $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function login(LoginRequest $loginRequest)
    {
        $user = $this->userService->login($loginRequest);
        return $this->success($user);
    }
}
