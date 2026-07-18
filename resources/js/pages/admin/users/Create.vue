<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import { ArrowLeft } from '@lucide/vue'

import UserForm from '@/components/admin/users/UserForm.vue'

import { Button } from '@/components/ui/button'

import {
    Card,
    CardContent,
    CardHeader,
    CardTitle,
} from '@/components/ui/card'

import { index } from '@/routes/admin/users'

defineProps<{
    roles: { value: string; label: string }[]
    civilStatuses: { value: string; label: string }[]
    idTypes: { value: string; label: string }[]
}>()
</script>

<template>
    <Head title="Create User" />

    <div class="flex flex-1 flex-col gap-4 p-4">
        <div class="flex items-center gap-4">
            <Button variant="ghost" size="icon" as-child>
                <Link :href="index()">
                    <ArrowLeft class="size-4" />
                </Link>
            </Button>

            <h1 class="text-xl font-semibold">
                Create User
            </h1>
        </div>

        <Card>
            <CardHeader>
                <CardTitle>User details</CardTitle>
            </CardHeader>

            <CardContent>
                <UserForm :roles="roles" :civil-statuses="civilStatuses" :id-types="idTypes" />
            </CardContent>
        </Card>
    </div>
</template>
