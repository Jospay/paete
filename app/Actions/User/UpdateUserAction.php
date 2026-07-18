<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateUserAction
{
    /**
     * Create a new class instance.
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
