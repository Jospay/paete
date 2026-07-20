<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ArrowLeft, Pencil, Trash } from '@lucide/vue';
import { ref } from 'vue';

import { Badge } from '@/components/ui/badge';
import { Button } from '@/components/ui/button';

import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';

import type { User } from '@/types';

import StaffDeleteDialog from '@/components/admin/staff/StaffDeleteDialog.vue';

import { edit, index } from '@/routes/admin/staff';

const props = defineProps<{
    staff: User;
}>();

const deleteDialogOpen = ref(false);

interface Field {
    label: string;
    value: string | null;
}

const fields: Field[] = [
    { label: 'Email', value: props.staff.email },
    { label: 'Mobile number', value: props.staff.mobile_number },
    { label: 'Date of birth', value: props.staff.date_of_birth },
    { label: 'Civil status', value: props.staff.civil_status },
    { label: 'Address', value: props.staff.address },
    { label: 'Occupation', value: props.staff.occupation },
    { label: 'Source of income', value: props.staff.source_of_income },
    { label: 'TIN', value: props.staff.tin },
    { label: 'ID type', value: props.staff.id_type },
    { label: 'ID number', value: props.staff.id_number },
];
</script>

<template>
    <Head :title="staff.full_name" />

    <div class="flex flex-1 flex-col gap-4 p-4">
        <div class="flex items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <Button variant="ghost" size="icon" as-child>
                    <Link :href="index()">
                        <ArrowLeft class="size-4" />
                    </Link>
                </Button>

                <h1 class="text-xl font-semibold">
                    {{ staff.full_name }}
                </h1>
            </div>

            <div class="flex items-center gap-2">
                <Button v-if="staff.can?.update" variant="outline" as-child>
                    <Link :href="edit(staff)">
                        <Pencil class="mr-2 size-4" />
                        Edit
                    </Link>
                </Button>

                <Button
                    v-if="staff.can?.delete"
                    variant="destructive"
                    @click="deleteDialogOpen = true"
                >
                    <Trash class="mr-2 size-4" />
                    Delete
                </Button>
            </div>
        </div>

        <Card>
            <CardHeader class="flex-row items-center justify-between">
                <CardTitle>Profile</CardTitle>

                <div class="flex flex-wrap gap-1">
                    <Badge
                        v-for="role in staff.roles"
                        :key="role"
                        variant="secondary"
                    >
                        {{ role }}
                    </Badge>

                    <Badge v-if="!staff.roles.length" variant="outline">
                        No role assigned
                    </Badge>
                </div>
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
                    <span v-if="staff.email_verified">
                        Email verified{{
                            staff.email_verified_at
                                ? ` on ${staff.email_verified_at}`
                                : ''
                        }}
                    </span>

                    <span v-else class="text-amber-600">
                        Email not verified
                    </span>
                </div>

                <div class="mt-1 text-sm text-muted-foreground">
                    Created {{ staff.created_at }} · Last updated
                    {{ staff.updated_at }}
                </div>
            </CardContent>
        </Card>

        <StaffDeleteDialog v-model:open="deleteDialogOpen" :staff="staff" />
    </div>
</template>
