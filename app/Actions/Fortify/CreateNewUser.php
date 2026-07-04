<?php

namespace App\Actions\Fortify;

use App\Concerns\PasswordValidationRules;
use App\Concerns\ProfileValidationRules;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules, ProfileValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            ...$this->profileRules(),
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'first_name' => $input['first_name'],
            'middle_name' => $input['middle_name'] ?? null,
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'mobile_number' => $input['mobile_number'],
            'date_of_birth' => $input['date_of_birth'],
            'civil_status' => $input['civil_status'],
            'address' => $input['address'],
            'occupation' => $input['occupation'],
            'source_of_income' => $input['source_of_income'],
            'tin' => $input['tin'] ?? null,
            'id_type' => $input['id_type'],
            'id_number' => $input['id_number'],
            'password' => $input['password'],
        ]);
    }
}
