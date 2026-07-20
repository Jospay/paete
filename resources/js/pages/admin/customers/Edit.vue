<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ArrowLeft } from '@lucide/vue';

import { Button } from '@/components/ui/button';

import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';

import { index } from '@/routes/admin/customers';

import type { User } from '@/types';

import CustomerForm from '@/components/admin/customers/CustomerForm.vue';

defineProps<{
    customer: User;
    civilStatuses: { value: string; label: string }[];
    idTypes: { value: string; label: string }[];
}>();
</script>

<template>
    <Head :title="`Edit ${customer.full_name}`" />

    <div class="flex flex-1 flex-col gap-4 p-4">
        <div class="flex items-center gap-4">
            <Button variant="ghost" size="icon" as-child>
                <Link :href="index()">
                    <ArrowLeft class="size-4" />
                </Link>
            </Button>

            <h1 class="text-xl font-semibold">Edit {{ customer.full_name }}</h1>
        </div>

        <Card>
            <CardHeader>
                <CardTitle>Customer details</CardTitle>
            </CardHeader>

            <CardContent>
                <CustomerForm
                    :customer="customer"
                    :civil-statuses="civilStatuses"
                    :id-types="idTypes"
                />
            </CardContent>
        </Card>
    </div>
</template>
