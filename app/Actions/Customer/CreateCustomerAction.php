<?php

namespace App\Actions\Customer;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateCustomerAction
{
    /**
     * Create a customer account (e.g. admin-assisted / walk-in
     * onboarding at a branch). Role is always 'customer' - unlike staff
     * creation, there's no role to pick.
     */
    public function execute(array $data): User
    {
        $data['password'] = Hash::make($data['password']);

        $customer = User::create($data);

        $customer->assignRole(RoleEnum::CUSTOMER->value);

        return $customer;
    }
}
