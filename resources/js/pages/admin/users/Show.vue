<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import { ArrowLeft, Pencil, Trash } from '@lucide/vue'
import { ref } from 'vue'

import UserDeleteDialog from '@/components/admin/users/UserDeleteDialog.vue'

import { Badge } from '@/components/ui/badge'
import { Button } from '@/components/ui/button'

import {
    Card,
    CardContent,
    CardHeader,
    CardTitle,
} from '@/components/ui/card'

import { edit, index } from '@/routes/admin/users'

import type { User } from '@/types'

const props = defineProps<{
    user: User
}>()

const deleteDialogOpen = ref(false)

interface Field {
    label: string
    value: string | null
}

const fields: Field[] = [
    { label: 'Email', value: props.user.email },
    { label: 'Mobile number', value: props.user.mobile_number },
    { label: 'Date of birth', value: props.user.date_of_birth },
    { label: 'Civil status', value: props.user.civil_status },
    { label: 'Address', value: props.user.address },
    { label: 'Occupation', value: props.user.occupation },
    { label: 'Source of income', value: props.user.source_of_income },
    { label: 'TIN', value: props.user.tin },
    { label: 'ID type', value: props.user.id_type },
    { label: 'ID number', value: props.user.id_number },
]
</script>

<template>
    <Head :title="user.full_name" />

    <div class="flex flex-1 flex-col gap-4 p-4">
        <div class="flex items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <Button variant="ghost" size="icon" as-child>
                    <Link :href="index()">
                        <ArrowLeft class="size-4" />
                    </Link>
                </Button>

                <h1 class="text-xl font-semibold">
                    {{ user.full_name }}
                </h1>
            </div>

            <div class="flex items-center gap-2">
                <Button v-if="user.can?.update" variant="outline" as-child>
                    <Link :href="edit(user)">
                        <Pencil class="mr-2 size-4" />
                        Edit
                    </Link>
                </Button>

                <Button
                    v-if="user.can?.delete"
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
                    <Badge v-for="role in user.roles" :key="role" variant="secondary">
                        {{ role }}
                    </Badge>

                    <Badge v-if="!user.roles.length" variant="outline">
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

                <div class="mt-4 flex items-center gap-2 text-sm text-muted-foreground">
                    <span v-if="user.email_verified">
                        Email verified{{ user.email_verified_at ? ` on ${user.email_verified_at}` : '' }}
                    </span>

                    <span v-else class="text-amber-600">
                        Email not verified
                    </span>
                </div>

                <div class="mt-1 text-sm text-muted-foreground">
                    Created {{ user.created_at }} · Last updated {{ user.updated_at }}
                </div>
            </CardContent>
        </Card>

        <UserDeleteDialog
            v-model:open="deleteDialogOpen"
            :user="user"
        />
    </div>
</template>
