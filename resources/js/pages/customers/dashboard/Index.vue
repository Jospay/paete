<script setup lang="ts">
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';

defineProps<{
    accounts: unknown[];
    loans: unknown[];
    cards: unknown[];
}>();

const page = usePage();
const user = computed(() => page.props.auth.user);
</script>

<template>
    <Head title="Dashboard" />

    <div class="flex flex-1 flex-col gap-4 p-4">
        <h1 class="text-xl font-semibold">
            Welcome back, {{ user.first_name }}
        </h1>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <Card>
                <CardHeader>
                    <CardTitle>Accounts</CardTitle>
                </CardHeader>
                <CardContent>
                    <p
                        v-if="accounts.length === 0"
                        class="text-sm text-muted-foreground"
                    >
                        You don't have any accounts yet.
                    </p>
                    <p v-else class="text-2xl font-semibold">
                        {{ accounts.length }}
                    </p>
                </CardContent>
            </Card>

            <Card>
                <CardHeader>
                    <CardTitle>Loans</CardTitle>
                </CardHeader>
                <CardContent>
                    <p
                        v-if="loans.length === 0"
                        class="text-sm text-muted-foreground"
                    >
                        No active loans.
                    </p>
                    <p v-else class="text-2xl font-semibold">
                        {{ loans.length }}
                    </p>
                </CardContent>
            </Card>

            <Card>
                <CardHeader>
                    <CardTitle>Cards</CardTitle>
                </CardHeader>
                <CardContent>
                    <p
                        v-if="cards.length === 0"
                        class="text-sm text-muted-foreground"
                    >
                        No cards issued yet.
                    </p>
                    <p v-else class="text-2xl font-semibold">
                        {{ cards.length }}
                    </p>
                </CardContent>
            </Card>
        </div>
    </div>
</template>
