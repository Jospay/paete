<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

import type { Paginated, User } from '@/types';

import CustomerDeleteDialog from '@/components/admin/customers/CustomerDeleteDialog.vue';
import CustomerTable from '@/components/admin/customers/CustomerTable.vue';
import CustomerTableToolbar from '@/components/admin/customers/CustomerTableToolbar.vue';
import TablePagination from '@/components/admin/shared/TablePagination.vue';

const selectedCustomer = ref<User | null>(null);
const deleteDialogOpen = ref(false);

function onDelete(customer: User) {
    selectedCustomer.value = customer;
    deleteDialogOpen.value = true;
}

defineProps<{
    customers: Paginated<User>;

    filters: {
        search: string | null;
    };

    sort: string;

    direction: 'asc' | 'desc';
}>();
</script>

<template>
    <Head title="Customers" />

    <div class="flex flex-1 flex-col gap-4 p-4">
        <CustomerTableToolbar :filters="filters" />

        <CustomerTable
            :customers="customers"
            :filters="filters"
            :sort="sort"
            :direction="direction"
            @delete="onDelete"
        />

        <TablePagination :items="customers" item-label="customers" />

        <CustomerDeleteDialog
            v-model:open="deleteDialogOpen"
            :customer="selectedCustomer"
        />
    </div>
</template>
