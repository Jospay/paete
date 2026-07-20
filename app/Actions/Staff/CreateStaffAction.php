<?php

namespace App\Actions\Staff;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateStaffAction
{
    /**
     * Create a new staff member.
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
