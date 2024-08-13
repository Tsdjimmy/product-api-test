<?php

namespace App\Services\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginUser
{
    public function execute(array $data)
    {
        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw new \Exception('Invalid credentials.');
        }

        $token = $user->createToken('Personal Access Token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
