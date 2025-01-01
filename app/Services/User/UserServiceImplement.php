<?php

namespace App\Services\User;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\User\UserRepository;

class UserServiceImplement extends ServiceApi implements UserService{

     protected string $title = "";

     protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
      $this->userRepository = $userRepository;
    }

    public function login()
    {
        // TODO: Implement login() method.
    }
}
