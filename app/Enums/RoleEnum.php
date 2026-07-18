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
}
