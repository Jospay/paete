<?php

namespace App\Http\Requests\Staff;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Concerns\PasswordValidationRules;
use App\Concerns\ProfileValidationRules;
use App\Enums\RoleEnum;
use Illuminate\Validation\Rule;

class UpdateStaffRequest extends FormRequest
{
    use PasswordValidationRules, ProfileValidationRules;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            ...$this->profileRules(userId: $this->route('staff')?->id, isPrecognitive: $this->isPrecognitive()),
            'password' => $this->optionalPasswordRules(),
            'role' => ['required', 'string', Rule::in(RoleEnum::staffValues())],
        ];
    }
}
