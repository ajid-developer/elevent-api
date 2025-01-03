<?php

namespace App\Services\User;

use App\Http\Requests\LoginRequest;
use LaravelEasyRepository\BaseService;

interface UserService extends BaseService{

    public function login(LoginRequest $request);
}
