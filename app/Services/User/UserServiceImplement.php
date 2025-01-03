<?php

namespace App\Services\User;

use App\Exceptions\IncorrectCredentialException;
use App\Http\Requests\LoginRequest;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\User\UserRepository;

class UserServiceImplement extends ServiceApi implements UserService
{

    protected $title = "";

    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws IncorrectCredentialException
     */
    public function login(LoginRequest $request)
    {
        if (!$token = auth()->attempt($request->validated()))
            throw new IncorrectCredentialException();

        $user = auth()->user();
        $ttl = auth()->factory()->getTTL() * 60;
        return [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => [
                    'id' => $user->roles[0]->id,
                    'name' => $user->roles[0]->name
                ]
            ],
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => $ttl
        ];
    }
}
