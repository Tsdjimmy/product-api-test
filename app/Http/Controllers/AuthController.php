<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use App\Services\ResponseService;

class AuthController extends Controller
{
    protected $authService;
    protected $responseService;

    public function __construct(AuthService $authService, ResponseService $responseService)
    {
        $this->authService = $authService;
        $this->responseService = $responseService;
    }

    public function register(RegisterRequest $request)
    {
        try {
            $data = $request->validated();
            $user = $this->authService->register($data);
            return $this->responseService->success($user, 'User registered successfully.');
        } catch (\Exception $exception) {
            return $this->responseService->error('User not registered successfully.');
        }
    }

    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $token = $this->authService->login($data);
        return $this->responseService->success(['token' => $token], 'Login successful.');
    }
}
