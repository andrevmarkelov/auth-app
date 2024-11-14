<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

trait CreateUser
{
    /**
     * Creating a new user
     *
     * @param array $data
     * @return User
     */
    protected function createUser(array $data): User
    {
        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
        ]);
    }
}
