<?php

namespace App\Services\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterUser
{
    public function execute(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('Personal Access Token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
