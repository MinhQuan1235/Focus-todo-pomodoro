<?php
/*
 * This file is part of the Request Platform package.
 *
 * (c) Tran The Hien <hientt53@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * App\Services\AuthService
 */
final class AuthService
{
    public function register(string $name, string $email, string $password): User
    {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        return $user;
    }
}
