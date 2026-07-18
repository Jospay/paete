<?php

namespace App\Enums;

enum RoleEnum: string
{
    case SUPER_ADMIN = 'super-admin';
    case BRANCH_MANAGER = 'branch-manager';
    case TELLER = 'teller';
    case LOAN_OFFICER = 'loan-officer';
    case COMPLIANCE_OFFICER = 'compliance-officer';
    case CUSTOMER_SUPPORT = 'customer-support';
    case AUDITOR = 'auditor';
    case CUSTOMER = 'customer';

    public function label(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'Super Admin',
            self::BRANCH_MANAGER => 'Branch Manager',
            self::TELLER => 'Teller',
            self::LOAN_OFFICER => 'Loan Officer',
            self::COMPLIANCE_OFFICER => 'Compliance Officer',
            self::CUSTOMER_SUPPORT => 'Customer Support',
            self::AUDITOR => 'Auditor',
            self::CUSTOMER => 'Customer',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * All cases as {value, label} pairs, ready to hand to the frontend
     * for a select input.
     *
     * @return array<int, array{value: string, label: string}>
     */
    public static function options(): array
    {
        return array_map(
            fn(self $case) => [
                'value' => $case->value,
                'label' => $case->label(),
            ],
            self::cases(),
        );
    }

    /**
     * Roles an admin can assign when creating/editing a staff account.
     * Excludes CUSTOMER, which is only ever set via self-registration
     * (see App\Actions\Fortify\CreateNewUser).
     *
     * @return array<int, self>
     */
    public static function staffCases(): array
    {
        return array_values(array_filter(
            self::cases(),
            fn(self $case) => $case !== self::CUSTOMER,
        ));
    }

    /**
     * @return array<int, string>
     */
    public static function staffValues(): array
    {
        return array_map(fn(self $case) => $case->value, self::staffCases());
    }

    /**
     * @return array<int, array{value: string, label: string}>
     */
    public static function staffOptions(): array
    {
        return array_map(
            fn(self $case) => [
                'value' => $case->value,
                'label' => $case->label(),
            ],
            self::staffCases(),
        );
    }
}
