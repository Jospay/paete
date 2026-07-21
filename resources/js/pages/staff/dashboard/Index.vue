<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import {
    IconBriefcase,
    IconBuildingBank,
    IconShieldCheck,
    IconUsers,
    IconWallet,
} from '@tabler/icons-vue';

import DashboardStatCard from '@/components/dashboard/DashboardStatCard.vue';

interface StaffSummary {
    total: number;
}

interface CustomerSummary {
    total: number;
    unverified: number;
}

const props = defineProps<{
    staffSummary: StaffSummary | null;
    customerSummary: CustomerSummary | null;
    accountSummary: Record<string, unknown> | null;
    loanSummary: Record<string, unknown> | null;
    complianceSummary: Record<string, unknown> | null;
}>();
</script>

<template>
    <Head title="Dashboard" />

    <div class="flex flex-1 flex-col gap-6 p-4 lg:p-6">
        <div>
            <h1 class="text-2xl font-semibold">Dashboard</h1>

            <p class="text-muted-foreground">
                Overview of your banking system.
            </p>
        </div>

        <div
            class="grid grid-cols-1 gap-4 *:data-[slot=card]:bg-linear-to-t *:data-[slot=card]:from-primary/5 *:data-[slot=card]:to-card *:data-[slot=card]:shadow-xs sm:grid-cols-2 xl:grid-cols-3"
        >
            <DashboardStatCard
                v-if="props.staffSummary"
                title="Staff"
                :value="props.staffSummary.total"
                description="Total staff members"
                footer="Active personnel in the organization."
                :icon="IconBriefcase"
            />

            <DashboardStatCard
                v-if="props.customerSummary"
                title="Customers"
                :value="props.customerSummary.total"
                :description="`${props.customerSummary.unverified} awaiting verification`"
                footer="Registered customers."
                :icon="IconUsers"
            />

            <DashboardStatCard
                v-if="props.accountSummary"
                title="Accounts"
                value="—"
                description="Coming soon"
                footer="Account statistics will appear here."
                :icon="IconBuildingBank"
            />

            <DashboardStatCard
                v-if="props.loanSummary"
                title="Loans"
                value="—"
                description="Coming soon"
                footer="Loan statistics will appear here."
                :icon="IconWallet"
            />

            <DashboardStatCard
                v-if="props.complianceSummary"
                title="Compliance"
                value="—"
                description="Coming soon"
                footer="Compliance statistics will appear here."
                :icon="IconShieldCheck"
            />
        </div>

        <p
            v-if="
                !props.staffSummary &&
                !props.customerSummary &&
                !props.accountSummary &&
                !props.loanSummary &&
                !props.complianceSummary
            "
            class="text-sm text-muted-foreground"
        >
            Nothing to show yet for your role.
        </p>
    </div>
</template>
