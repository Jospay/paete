<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

import type { Paginated, User } from '@/types';

import TablePagination from '@/components/admin/shared/TablePagination.vue';
import StaffDeleteDialog from '@/components/admin/staff/StaffDeleteDialog.vue';
import StaffTable from '@/components/admin/staff/StaffTable.vue';
import StaffTableToolbar from '@/components/admin/staff/StaffTableToolbar.vue';

const selectedStaff = ref<User | null>(null);
const deleteDialogOpen = ref(false);

function onDelete(member: User) {
    selectedStaff.value = member;
    deleteDialogOpen.value = true;
}

defineProps<{
    staff: Paginated<User>;

    filters: {
        search: string | null;
    };

    sort: string;

    direction: 'asc' | 'desc';
}>();
</script>

<template>
    <Head title="Staff" />

    <div class="flex flex-1 flex-col gap-4 p-4">
        <StaffTableToolbar :filters="filters" />

        <StaffTable
            :staff="staff"
            :filters="filters"
            :sort="sort"
            :direction="direction"
            @delete="onDelete"
        />

        <TablePagination :items="staff" item-label="staff" />

        <StaffDeleteDialog
            v-model:open="deleteDialogOpen"
            :staff="selectedStaff"
        />
    </div>
</template>
