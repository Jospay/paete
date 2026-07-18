<?php

namespace App\Enums;

enum PermissionEnum: string
{
    // Accounts
    case ACCOUNTS_VIEW = 'accounts.view';
    case ACCOUNTS_CREATE = 'accounts.create';
    case ACCOUNTS_UPDATE = 'accounts.update';
    case ACCOUNTS_CLOSE = 'accounts.close';
    case ACCOUNTS_FREEZE = 'accounts.freeze';

    // Transactions
    case TRANSACTIONS_VIEW = 'transactions.view';
    case TRANSACTIONS_DEPOSIT = 'transactions.deposit';
    case TRANSACTIONS_WITHDRAW = 'transactions.withdraw';
    case TRANSACTIONS_TRANSFER = 'transactions.transfer';
    case TRANSACTIONS_REVERSE = 'transactions.reverse';
    case TRANSACTIONS_APPROVE_LARGE = 'transactions.approve-large';

    // Loans
    case LOANS_VIEW = 'loans.view';
    case LOANS_APPLY = 'loans.apply';
    case LOANS_REVIEW = 'loans.review';
    case LOANS_APPROVE = 'loans.approve';
    case LOANS_REJECT = 'loans.reject';
    case LOANS_DISBURSE = 'loans.disburse';

    // Cards
    case CARDS_VIEW = 'cards.view';
    case CARDS_ISSUE = 'cards.issue';
    case CARDS_BLOCK = 'cards.block';
    case CARDS_REISSUE = 'cards.reissue';

    // Customers / KYC
    case CUSTOMERS_VIEW = 'customers.view';
    case CUSTOMERS_CREATE = 'customers.create';
    case CUSTOMERS_UPDATE = 'customers.update';
    case CUSTOMERS_KYC_VERIFY = 'customers.kyc-verify';
    case CUSTOMERS_BLACKLIST = 'customers.blacklist';

    // Compliance / Risk
    case COMPLIANCE_VIEW_REPORTS = 'compliance.view-reports';
    case COMPLIANCE_FLAG_SUSPICIOUS = 'compliance.flag-suspicious';
    case COMPLIANCE_AUDIT_LOGS = 'compliance.audit-logs';
    case COMPLIANCE_AML_REVIEW = 'compliance.aml-review';

    // Reports & Dashboards
    case REPORTS_VIEW = 'reports.view';
    case REPORTS_EXPORT = 'reports.export';
    case REPORTS_FINANCIAL_STATEMENTS = 'reports.financial-statements';

    // Branch / Staff management
    case BRANCHES_VIEW = 'branches.view';
    case BRANCHES_MANAGE = 'branches.manage';
    case STAFF_VIEW = 'staff.view';
    case STAFF_CREATE = 'staff.create';
    case STAFF_UPDATE = 'staff.update';
    case STAFF_DEACTIVATE = 'staff.deactivate';
    case STAFF_ASSIGN_ROLES = 'staff.assign-roles';

    // System / Admin
    case SETTINGS_MANAGE = 'settings.manage';
    case ROLES_MANAGE = 'roles.manage';
    case PERMISSIONS_MANAGE = 'permissions.manage';
    case SYSTEM_AUDIT = 'system.audit';

    public function label(): string
    {
        return match ($this) {
            self::ACCOUNTS_VIEW => 'View Accounts',
            self::ACCOUNTS_CREATE => 'Create Accounts',
            self::ACCOUNTS_UPDATE => 'Update Accounts',
            self::ACCOUNTS_CLOSE => 'Close Accounts',
            self::ACCOUNTS_FREEZE => 'Freeze Accounts',

            self::TRANSACTIONS_VIEW => 'View Transactions',
            self::TRANSACTIONS_DEPOSIT => 'Deposit Funds',
            self::TRANSACTIONS_WITHDRAW => 'Withdraw Funds',
            self::TRANSACTIONS_TRANSFER => 'Transfer Funds',
            self::TRANSACTIONS_REVERSE => 'Reverse Transactions',
            self::TRANSACTIONS_APPROVE_LARGE => 'Approve Large Transactions',

            self::LOANS_VIEW => 'View Loans',
            self::LOANS_APPLY => 'Apply for Loan',
            self::LOANS_REVIEW => 'Review Loan Applications',
            self::LOANS_APPROVE => 'Approve Loans',
            self::LOANS_REJECT => 'Reject Loans',
            self::LOANS_DISBURSE => 'Disburse Loans',

            self::CARDS_VIEW => 'View Cards',
            self::CARDS_ISSUE => 'Issue Cards',
            self::CARDS_BLOCK => 'Block Cards',
            self::CARDS_REISSUE => 'Reissue Cards',

            self::CUSTOMERS_VIEW => 'View Customers',
            self::CUSTOMERS_CREATE => 'Create Customers',
            self::CUSTOMERS_UPDATE => 'Update Customers',
            self::CUSTOMERS_KYC_VERIFY => 'Verify Customer KYC',
            self::CUSTOMERS_BLACKLIST => 'Blacklist Customers',

            self::COMPLIANCE_VIEW_REPORTS => 'View Compliance Reports',
            self::COMPLIANCE_FLAG_SUSPICIOUS => 'Flag Suspicious Activity',
            self::COMPLIANCE_AUDIT_LOGS => 'View Audit Logs',
            self::COMPLIANCE_AML_REVIEW => 'AML Review',

            self::REPORTS_VIEW => 'View Reports',
            self::REPORTS_EXPORT => 'Export Reports',
            self::REPORTS_FINANCIAL_STATEMENTS => 'View Financial Statements',

            self::BRANCHES_VIEW => 'View Branches',
            self::BRANCHES_MANAGE => 'Manage Branches',
            self::STAFF_VIEW => 'View Staff',
            self::STAFF_CREATE => 'Create Staff',
            self::STAFF_UPDATE => 'Update Staff',
            self::STAFF_DEACTIVATE => 'Deactivate Staff',
            self::STAFF_ASSIGN_ROLES => 'Assign Staff Roles',

            self::SETTINGS_MANAGE => 'Manage Settings',
            self::ROLES_MANAGE => 'Manage Roles',
            self::PERMISSIONS_MANAGE => 'Manage Permissions',
            self::SYSTEM_AUDIT => 'System Audit',
        };
    }

    /**
     * Group key, useful for building a permission matrix UI
     * e.g. "Accounts", "Transactions", "Loans" as section headers.
     */
    public function group(): string
    {
        return match (true) {
            str_starts_with($this->value, 'accounts.') => 'Accounts',
            str_starts_with($this->value, 'transactions.') => 'Transactions',
            str_starts_with($this->value, 'loans.') => 'Loans',
            str_starts_with($this->value, 'cards.') => 'Cards',
            str_starts_with($this->value, 'customers.') => 'Customers',
            str_starts_with($this->value, 'compliance.') => 'Compliance',
            str_starts_with($this->value, 'reports.') => 'Reports',
            str_starts_with($this->value, 'branches.'), str_starts_with($this->value, 'staff.') => 'Branch & Staff',
            default => 'System',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Cases grouped by section, ready to loop over in a Blade view.
     */
    public static function grouped(): array
    {
        $grouped = [];
        foreach (self::cases() as $case) {
            $grouped[$case->group()][] = $case;
        }
        return $grouped;
    }
}
