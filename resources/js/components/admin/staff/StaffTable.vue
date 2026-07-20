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

import type { Paginated, User } from '@/types';

import StaffTableRowActions from './StaffTableRowActions.vue';

import { index } from '@/routes/admin/staff';

const props = defineProps<{
    staff: Paginated<User>;

    filters: {
        search: string | null;
    };

    sort: string;
    direction: 'asc' | 'desc';
}>();

const emit = defineEmits<{
    delete: [staff: User];
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

                    <TableHead>Role</TableHead>

                    <TableHead>Mobile</TableHead>

                    <TableHead class="w-15" />
                </TableRow>
            </TableHeader>

            <TableBody>
                <TableRow v-for="member in staff.data" :key="member.id">
                    <TableCell>
                        <div class="flex flex-col">
                            <span class="font-medium">
                                {{ member.full_name }}
                            </span>

                            <span class="text-xs text-muted-foreground">
                                #{{ member.id }}
                            </span>
                        </div>
                    </TableCell>

                    <TableCell>
                        <div class="flex flex-col">
                            <span>
                                {{ member.email }}
                            </span>

                            <span
                                v-if="!member.email_verified"
                                class="text-xs text-amber-600"
                            >
                                Unverified
                            </span>
                        </div>
                    </TableCell>

                    <TableCell>
                        {{ member.created_at }}
                    </TableCell>

                    <TableCell>
                        {{ member.primary_role ?? '—' }}
                    </TableCell>

                    <TableCell>
                        {{ member.mobile_number ?? '—' }}
                    </TableCell>

                    <TableCell class="text-right">
                        <StaffTableRowActions
                            :staff="member"
                            @delete="emit('delete', $event)"
                        />
                    </TableCell>
                </TableRow>

                <TableRow v-if="staff.data.length === 0">
                    <TableCell
                        :colspan="6"
                        class="h-32 text-center text-muted-foreground"
                    >
                        No staff members found.
                    </TableCell>
                </TableRow>
            </TableBody>
        </Table>
    </div>
</template>
