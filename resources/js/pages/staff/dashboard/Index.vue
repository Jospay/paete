<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';

interface StaffSummary {
    total: number;
}

interface CustomerSummary {
    total: number;
    unverified: number;
}

defineProps<{
    staffSummary: StaffSummary | null;
    customerSummary: CustomerSummary | null;
    accountSummary: Record<string, unknown> | null;
    loanSummary: Record<string, unknown> | null;
    complianceSummary: Record<string, unknown> | null;
}>();
</script>

<template>
    <Head title="Dashboard" />

    <div class="flex flex-1 flex-col gap-4 p-4">
        <h1 class="text-xl font-semibold">Dashboard</h1>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <Card v-if="staffSummary">
                <CardHeader>
                    <CardTitle>Staff</CardTitle>
                </CardHeader>
                <CardContent>
                    <p class="text-2xl font-semibold">
                        {{ staffSummary.total }}
                    </p>
                    <p class="text-sm text-muted-foreground">
                        Total staff members
                    </p>
                </CardContent>
            </Card>

            <Card v-if="customerSummary">
                <CardHeader>
                    <CardTitle>Customers</CardTitle>
                </CardHeader>
                <CardContent>
                    <p class="text-2xl font-semibold">
                        {{ customerSummary.total }}
                    </p>
                    <p class="text-sm text-muted-foreground">
                        Total customers
                        <span v-if="customerSummary.unverified">
                            · {{ customerSummary.unverified }} unverified
                        </span>
                    </p>
                </CardContent>
            </Card>

            <!--
                Account/loan/compliance cards intentionally left as
                placeholders - fill these in once DashboardController's
                corresponding TODO methods return real data.
            -->
            <Card v-if="accountSummary">
                <CardHeader>
                    <CardTitle>Accounts</CardTitle>
                </CardHeader>
                <CardContent>
                    <p class="text-sm text-muted-foreground">Coming soon.</p>
                </CardContent>
            </Card>

            <Card v-if="loanSummary">
                <CardHeader>
                    <CardTitle>Loans</CardTitle>
                </CardHeader>
                <CardContent>
                    <p class="text-sm text-muted-foreground">Coming soon.</p>
                </CardContent>
            </Card>

            <Card v-if="complianceSummary">
                <CardHeader>
                    <CardTitle>Compliance</CardTitle>
                </CardHeader>
                <CardContent>
                    <p class="text-sm text-muted-foreground">Coming soon.</p>
                </CardContent>
            </Card>
        </div>

        <p
            v-if="
                !staffSummary &&
                !customerSummary &&
                !accountSummary &&
                !loanSummary &&
                !complianceSummary
            "
            class="text-sm text-muted-foreground"
        >
            Nothing to show yet for your role.
        </p>
    </div>
</template>
