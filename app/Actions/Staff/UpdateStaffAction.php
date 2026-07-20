<?php

namespace App\Actions\Staff;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateStaffAction
{
    /**
     * Update a staff member's profile, role, and (optionally) password.
     */
    public function execute(User $user, array $data): User
    {
        $role = $data['role'];
        unset($data['role']);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        $user->syncRoles($role);

        return $user;
    }
}
