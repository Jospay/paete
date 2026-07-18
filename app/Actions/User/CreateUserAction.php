<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
    /**
     * Create a new class instance.
     */
    public function execute(array $data): User
    {
        $role = $data['role'];
        unset($data['role']);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $user->assignRole($role);

        return $user;
    }
}
