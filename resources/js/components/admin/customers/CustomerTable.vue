<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ArrowDown, ArrowUp, ChevronsUpDown } from '@lucide/vue';

import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';

import { index } from '@/routes/admin/customers';

import type { Paginated, User } from '@/types';

import CustomerTableRowActions from './CustomerTableRowActions.vue';

const props = defineProps<{
    customers: Paginated<User>;

    filters: {
        search: string | null;
    };

    sort: string;
    direction: 'asc' | 'desc';
}>();

const emit = defineEmits<{
    delete: [customer: User];
}>();

interface SortableColumn {
    label: string;
    field: string;
}

const columns: SortableColumn[] = [
    { label: 'Name', field: 'last_name' },
    { label: 'Email', field: 'email' },
    { label: 'Created', field: 'created_at' },
];

function sortHref(field: string) {
    const nextDirection =
        props.sort === field && props.direction === 'asc' ? 'desc' : 'asc';

    return index({
        query: {
            search: props.filters.search || undefined,
            sort: field,
            direction: nextDirection,
        },
    });
}
</script>

<template>
    <div class="overflow-hidden rounded-lg border">
        <Table>
            <TableHeader>
                <TableRow>
                    <TableHead v-for="column in columns" :key="column.field">
                        <Link
                            :href="sortHref(column.field)"
                            class="flex items-center gap-1 hover:text-foreground"
                            preserve-state
                            preserve-scroll
                        >
                            {{ column.label }}

                            <ArrowUp
                                v-if="
                                    sort === column.field && direction === 'asc'
                                "
                                class="size-3.5"
                            />

                            <ArrowDown
                                v-else-if="
                                    sort === column.field &&
                                    direction === 'desc'
                                "
                                class="size-3.5"
                            />

                            <ChevronsUpDown
                                v-else
                                class="size-3.5 text-muted-foreground/50"
                            />
                        </Link>
                    </TableHead>

                    <TableHead>Mobile</TableHead>

                    <TableHead class="w-15" />
                </TableRow>
            </TableHeader>

            <TableBody>
                <TableRow v-for="customer in customers.data" :key="customer.id">
                    <TableCell>
                        <div class="flex flex-col">
                            <span class="font-medium">
                                {{ customer.full_name }}
                            </span>

                            <span class="text-xs text-muted-foreground">
                                #{{ customer.id }}
                            </span>
                        </div>
                    </TableCell>

                    <TableCell>
                        <div class="flex flex-col">
                            <span>
                                {{ customer.email }}
                            </span>

                            <span
                                v-if="!customer.email_verified"
                                class="text-xs text-amber-600"
                            >
                                Unverified
                            </span>
                        </div>
                    </TableCell>

                    <TableCell>
                        {{ customer.created_at }}
                    </TableCell>

                    <TableCell>
                        {{ customer.mobile_number ?? '—' }}
                    </TableCell>

                    <TableCell class="text-right">
                        <CustomerTableRowActions
                            :customer="customer"
                            @delete="emit('delete', $event)"
                        />
                    </TableCell>
                </TableRow>

                <TableRow v-if="customers.data.length === 0">
                    <TableCell
                        :colspan="5"
                        class="h-32 text-center text-muted-foreground"
                    >
                        No customers found.
                    </TableCell>
                </TableRow>
            </TableBody>
        </Table>
    </div>
</template>
