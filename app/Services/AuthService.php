<?php

namespace App\Services;

use App\Services\Actions\RegisterUser;
use App\Services\Actions\LoginUser;

class AuthService
{
    protected $registerUser;
    protected $loginUser;

    public function __construct(RegisterUser $registerUser, LoginUser $loginUser)
    {
        $this->registerUser = $registerUser;
        $this->loginUser = $loginUser;
    }

    public function register(array $data)
    {
        return $this->registerUser->execute($data);
    }

    public function login(array $data)
    {
        return $this->loginUser->execute($data);
    }
}
