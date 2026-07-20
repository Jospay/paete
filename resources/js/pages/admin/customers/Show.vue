<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ArrowLeft, Pencil, Trash } from '@lucide/vue';
import { ref } from 'vue';

import { Button } from '@/components/ui/button';

import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';

import { edit, index } from '@/routes/admin/customers';

import type { User } from '@/types';

import CustomerDeleteDialog from '@/components/admin/customers/CustomerDeleteDialog.vue';

const props = defineProps<{
    customer: User;
}>();

const deleteDialogOpen = ref(false);

interface Field {
    label: string;
    value: string | null;
}

const fields: Field[] = [
    { label: 'Email', value: props.customer.email },
    { label: 'Mobile number', value: props.customer.mobile_number },
    { label: 'Date of birth', value: props.customer.date_of_birth },
    { label: 'Civil status', value: props.customer.civil_status },
    { label: 'Address', value: props.customer.address },
    { label: 'Occupation', value: props.customer.occupation },
    { label: 'Source of income', value: props.customer.source_of_income },
    { label: 'TIN', value: props.customer.tin },
    { label: 'ID type', value: props.customer.id_type },
    { label: 'ID number', value: props.customer.id_number },
];
</script>

<template>
    <Head :title="customer.full_name" />

    <div class="flex flex-1 flex-col gap-4 p-4">
        <div class="flex items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <Button variant="ghost" size="icon" as-child>
                    <Link :href="index()">
                        <ArrowLeft class="size-4" />
                    </Link>
                </Button>

                <h1 class="text-xl font-semibold">
                    {{ customer.full_name }}
                </h1>
            </div>

            <div class="flex items-center gap-2">
                <Button v-if="customer.can?.update" variant="outline" as-child>
                    <Link :href="edit(customer)">
                        <Pencil class="mr-2 size-4" />
                        Edit
                    </Link>
                </Button>

                <Button
                    v-if="customer.can?.delete"
                    variant="destructive"
                    @click="deleteDialogOpen = true"
                >
                    <Trash class="mr-2 size-4" />
                    Delete
                </Button>
            </div>
        </div>

        <Card>
            <CardHeader>
                <CardTitle>Profile</CardTitle>
            </CardHeader>

            <CardContent>
                <dl class="grid gap-4 sm:grid-cols-2">
                    <div v-for="field in fields" :key="field.label">
                        <dt class="text-sm text-muted-foreground">
                            {{ field.label }}
                        </dt>

                        <dd class="font-medium">
                            {{ field.value ?? '—' }}
                        </dd>
                    </div>
                </dl>

                <div
                    class="mt-4 flex items-center gap-2 text-sm text-muted-foreground"
                >
                    <span v-if="customer.email_verified">
                        Email verified{{
                            customer.email_verified_at
                                ? ` on ${customer.email_verified_at}`
                                : ''
                        }}
                    </span>

                    <span v-else class="text-amber-600">
                        Email not verified
                    </span>
                </div>

                <div class="mt-1 text-sm text-muted-foreground">
                    Created {{ customer.created_at }} · Last updated
                    {{ customer.updated_at }}
                </div>
            </CardContent>
        </Card>

        <CustomerDeleteDialog
            v-model:open="deleteDialogOpen"
            :customer="customer"
        />
    </div>
</template>
