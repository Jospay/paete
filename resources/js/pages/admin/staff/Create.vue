<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ArrowLeft } from '@lucide/vue';

import { Button } from '@/components/ui/button';

import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';

import StaffForm from '@/components/admin/staff/StaffForm.vue';

import { index } from '@/routes/admin/staff';

defineProps<{
    roles: { value: string; label: string }[];
    civilStatuses: { value: string; label: string }[];
    idTypes: { value: string; label: string }[];
}>();
</script>

<template>
    <Head title="Create Staff Member" />

    <div class="flex flex-1 flex-col gap-4 p-4">
        <div class="flex items-center gap-4">
            <Button variant="ghost" size="icon" as-child>
                <Link :href="index()">
                    <ArrowLeft class="size-4" />
                </Link>
            </Button>

            <h1 class="text-xl font-semibold">Create Staff Member</h1>
        </div>

        <Card>
            <CardHeader>
                <CardTitle>Staff details</CardTitle>
            </CardHeader>

            <CardContent>
                <StaffForm
                    :roles="roles"
                    :civil-statuses="civilStatuses"
                    :id-types="idTypes"
                />
            </CardContent>
        </Card>
    </div>
</template>
