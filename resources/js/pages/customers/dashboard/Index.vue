<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import {
    IconBuildingBank,
    IconCreditCard,
    IconWallet,
} from '@tabler/icons-vue';

import { computed } from 'vue';

import DashboardStatCard from '@/components/dashboard/DashboardStatCard.vue';

const props = defineProps<{
    accounts: unknown[];
    loans: unknown[];
    cards: unknown[];
}>();

const page = usePage();

const user = computed(() => page.props.auth.user);
</script>

<template>
    <Head title="Dashboard" />

    <div class="flex flex-1 flex-col gap-6 p-4 lg:p-6">
        <div>
            <h1 class="text-2xl font-semibold">
                Welcome back, {{ user.first_name }}
            </h1>

            <p class="text-muted-foreground">
                Here's a quick overview of your banking products.
            </p>
        </div>

        <div
            class="grid grid-cols-1 gap-4 *:data-[slot=card]:bg-linear-to-t *:data-[slot=card]:from-primary/5 *:data-[slot=card]:to-card *:data-[slot=card]:shadow-xs sm:grid-cols-2 xl:grid-cols-3"
        >
            <DashboardStatCard
                title="Accounts"
                :value="props.accounts.length"
                description="Active accounts"
                footer="Manage your savings and checking accounts."
                :icon="IconBuildingBank"
            />

            <DashboardStatCard
                title="Loans"
                :value="props.loans.length"
                description="Current loans"
                footer="Track loan repayments and balances."
                :icon="IconWallet"
            />

            <DashboardStatCard
                title="Cards"
                :value="props.cards.length"
                description="Issued cards"
                footer="View and manage your cards."
                :icon="IconCreditCard"
            />
        </div>
    </div>
</template>
