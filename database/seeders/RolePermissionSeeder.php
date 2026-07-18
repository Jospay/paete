<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artisan::call('permission:cache-reset');

        // ---------------------------------------------------------
        // PERMISSIONS
        // ---------------------------------------------------------
        foreach (PermissionEnum::cases() as $permission) {
            Permission::findOrCreate($permission);
        }

        // ---------------------------------------------------------
        // ROLES
        // ---------------------------------------------------------

        $superAdmin = Role::findOrCreate(RoleEnum::SUPER_ADMIN);
        $superAdmin->syncPermissions(Permission::all());

        $branchManager = Role::findOrCreate(RoleEnum::BRANCH_MANAGER);
        $branchManager->syncPermissions([
            PermissionEnum::ACCOUNTS_VIEW,
            PermissionEnum::ACCOUNTS_CREATE,
            PermissionEnum::ACCOUNTS_UPDATE,
            PermissionEnum::ACCOUNTS_CLOSE,
            PermissionEnum::ACCOUNTS_FREEZE,
            PermissionEnum::TRANSACTIONS_VIEW,
            PermissionEnum::TRANSACTIONS_APPROVE_LARGE,
            PermissionEnum::TRANSACTIONS_REVERSE,
            PermissionEnum::LOANS_VIEW,
            PermissionEnum::LOANS_REVIEW,
            PermissionEnum::LOANS_APPROVE,
            PermissionEnum::LOANS_REJECT,
            PermissionEnum::CUSTOMERS_VIEW,
            PermissionEnum::CUSTOMERS_CREATE,
            PermissionEnum::CUSTOMERS_UPDATE,
            PermissionEnum::CUSTOMERS_BLACKLIST,
            PermissionEnum::STAFF_VIEW,
            PermissionEnum::STAFF_CREATE,
            PermissionEnum::STAFF_UPDATE,
            PermissionEnum::STAFF_ASSIGN_ROLES,
            PermissionEnum::BRANCHES_VIEW,
            PermissionEnum::BRANCHES_MANAGE,
            PermissionEnum::REPORTS_VIEW,
            PermissionEnum::REPORTS_EXPORT,
            PermissionEnum::REPORTS_FINANCIAL_STATEMENTS,
            PermissionEnum::COMPLIANCE_VIEW_REPORTS,
        ]);

        $teller = Role::findOrCreate(RoleEnum::TELLER);
        $teller->syncPermissions([
            PermissionEnum::ACCOUNTS_VIEW,
            PermissionEnum::TRANSACTIONS_VIEW,
            PermissionEnum::TRANSACTIONS_DEPOSIT,
            PermissionEnum::TRANSACTIONS_WITHDRAW,
            PermissionEnum::TRANSACTIONS_TRANSFER,
            PermissionEnum::CUSTOMERS_VIEW,
            PermissionEnum::CUSTOMERS_CREATE,
            PermissionEnum::CUSTOMERS_UPDATE,
            PermissionEnum::CUSTOMERS_KYC_VERIFY,
            PermissionEnum::CARDS_VIEW,
            PermissionEnum::CARDS_ISSUE,
            PermissionEnum::CARDS_BLOCK,
        ]);

        $loanOfficer = Role::findOrCreate(RoleEnum::LOAN_OFFICER);
        $loanOfficer->syncPermissions([
            PermissionEnum::CUSTOMERS_VIEW,
            PermissionEnum::LOANS_VIEW,
            PermissionEnum::LOANS_APPLY,
            PermissionEnum::LOANS_REVIEW,
            PermissionEnum::LOANS_DISBURSE,
            PermissionEnum::ACCOUNTS_VIEW,
            PermissionEnum::REPORTS_VIEW,
        ]);

        $compliance = Role::findOrCreate(RoleEnum::COMPLIANCE_OFFICER);
        $compliance->syncPermissions([
            PermissionEnum::COMPLIANCE_VIEW_REPORTS,
            PermissionEnum::COMPLIANCE_FLAG_SUSPICIOUS,
            PermissionEnum::COMPLIANCE_AUDIT_LOGS,
            PermissionEnum::COMPLIANCE_AML_REVIEW,
            PermissionEnum::CUSTOMERS_VIEW,
            PermissionEnum::CUSTOMERS_BLACKLIST,
            PermissionEnum::TRANSACTIONS_VIEW,
            PermissionEnum::ACCOUNTS_FREEZE,
            PermissionEnum::REPORTS_VIEW,
            PermissionEnum::SYSTEM_AUDIT,
        ]);

        $support = Role::findOrCreate(RoleEnum::CUSTOMER_SUPPORT);
        $support->syncPermissions([
            PermissionEnum::ACCOUNTS_VIEW,
            PermissionEnum::TRANSACTIONS_VIEW,
            PermissionEnum::CUSTOMERS_VIEW,
            PermissionEnum::CUSTOMERS_UPDATE,
            PermissionEnum::CARDS_VIEW,
            PermissionEnum::CARDS_BLOCK,
            PermissionEnum::CARDS_REISSUE,
        ]);

        $auditor = Role::findOrCreate(RoleEnum::AUDITOR);
        $auditor->syncPermissions([
            PermissionEnum::ACCOUNTS_VIEW,
            PermissionEnum::TRANSACTIONS_VIEW,
            PermissionEnum::LOANS_VIEW,
            PermissionEnum::CARDS_VIEW,
            PermissionEnum::CUSTOMERS_VIEW,
            PermissionEnum::COMPLIANCE_VIEW_REPORTS,
            PermissionEnum::COMPLIANCE_AUDIT_LOGS,
            PermissionEnum::REPORTS_VIEW,
            PermissionEnum::REPORTS_FINANCIAL_STATEMENTS,
            PermissionEnum::SYSTEM_AUDIT,
        ]);

        $customer = Role::findOrCreate(RoleEnum::CUSTOMER);
        $customer->syncPermissions([
            PermissionEnum::ACCOUNTS_VIEW,
            PermissionEnum::TRANSACTIONS_VIEW,
            PermissionEnum::TRANSACTIONS_TRANSFER,
            PermissionEnum::LOANS_APPLY,
            PermissionEnum::LOANS_VIEW,
            PermissionEnum::CARDS_VIEW,
        ]);
    }
}
