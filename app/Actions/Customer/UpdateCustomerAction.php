<?php

namespace App\Actions\Customer;

use App\Models\User;

class UpdateCustomerAction
{
    /**
     * Update a customer's profile.
     *
     * Deliberately simpler than UpdateUserAction - no role syncing, no
     * password handling. Customers keep the 'customer' role for life and
     * manage their own password outside the admin panel.
     */
    public function execute(User $customer, array $data): User
    {
        $customer->update($data);

        return $customer;
    }
}
