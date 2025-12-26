<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function login(array $data): User
    {
        $user = User::where('email', $data['email'])->first();
        if (!$user) {
            throw new \Exception('User not found');
        }
        if (!Hash::check($data['password'], $user->password)) {
            throw new \Exception('Invalid password');
        }
        return $user;
    }
}