<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import { ref } from 'vue'

import UserDeleteDialog from '@/components/admin/users/UserDeleteDialog.vue'
import UserTable from '@/components/admin/users/UserTable.vue'
import UserTablePagination from '@/components/admin/users/UserTablePagination.vue'
import UserTableToolbar from '@/components/admin/users/UserTableToolbar.vue'

import type {
    Paginated,
    User,
} from '@/types'

const selectedUser = ref<User | null>(null)
const deleteDialogOpen = ref(false)

function onDelete(user: User) {
    selectedUser.value = user
    deleteDialogOpen.value = true
}

defineProps<{
    users: Paginated<User>

    filters: {
        search: string | null
    }

    sort: string

    direction: 'asc' | 'desc'
}>()
</script>

<template>
    <Head title="Users" />

    <div class="flex flex-1 flex-col gap-4 p-4">
        <UserTableToolbar
            :filters="filters"
        />

        <UserTable
            :users="users"
            :filters="filters"
            :sort="sort"
            :direction="direction"
            @delete="onDelete"
        />

        <UserTablePagination
            :users="users"
        />

        <UserDeleteDialog
            v-model:open="deleteDialogOpen"
            :user="selectedUser"
        />
    </div>
</template>
