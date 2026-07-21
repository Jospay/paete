<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();

        if ($user->hasRole(RoleEnum::CUSTOMER->value)) {
            return $this->customerDashboard($user);
        }

        return Inertia::render('staff/dashboard/Index', [
            'staffSummary' => $user->can(PermissionEnum::STAFF_VIEW->value)
                ? $this->staffSummary()
                : null,

            'customerSummary' => $user->can(PermissionEnum::CUSTOMERS_VIEW->value)
                ? $this->customerSummary()
                : null,

            'accountSummary' => $user->can(PermissionEnum::ACCOUNTS_VIEW->value)
                ? $this->accountSummary()
                : null,

            'loanSummary' => $user->can(PermissionEnum::LOANS_VIEW->value)
                ? $this->loanSummary()
                : null,

            'complianceSummary' => $user->can(PermissionEnum::COMPLIANCE_VIEW_REPORTS->value)
                ? $this->complianceSummary()
                : null,
        ]);
    }

    /**
     * Display the customer-facing dashboard - the customer's own profile
     * and (once wired up) their own accounts/loans/cards, never other
     * customers' data or admin-facing summaries.
     */
    private function customerDashboard(User $user): Response
    {
        return Inertia::render('customers/dashboard/Index', [
            // TODO: replace with real queries once Account/Loan/Card
            // models exist, scoped to $user->id (e.g.
            // $user->accounts()->get()), never a global count like the
            // staff dashboard's summaries.
            'accounts' => [],
            'loans' => [],
            'cards' => [],
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    private function staffSummary(): array
    {
        return [
            'total' => User::query()->role(RoleEnum::staffValues())->count(),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function customerSummary(): array
    {
        return [
            'total' => User::query()->role(RoleEnum::CUSTOMER->value)->count(),

            'unverified' => User::query()
                ->role(RoleEnum::CUSTOMER->value)
                ->whereNull('email_verified_at')
                ->count(),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function accountSummary(): array
    {
        // TODO: wire up once your Account model exists.
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    private function loanSummary(): array
    {
        // TODO: wire up once your Loan model exists.
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    private function complianceSummary(): array
    {
        // TODO: wire up once you have flagged-transaction/audit-log data.
        return [];
    }
}
