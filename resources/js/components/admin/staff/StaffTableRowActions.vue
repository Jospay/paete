<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

import { Ellipsis, Eye, Pencil, Trash } from '@lucide/vue';

import { Button } from '@/components/ui/button';

import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';

import { edit, show } from '@/routes/admin/staff';

import type { User } from '@/types';

defineProps<{
    staff: User;
}>();

const emit = defineEmits<{
    delete: [staff: User];
}>();
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger as-child>
            <Button variant="ghost" size="icon">
                <Ellipsis class="size-4" />
            </Button>
        </DropdownMenuTrigger>

        <DropdownMenuContent align="end">
            <DropdownMenuItem v-if="staff.can?.view" as-child>
                <Link :href="show(staff)">
                    <Eye class="mr-2 size-4" />
                    View
                </Link>
            </DropdownMenuItem>

            <DropdownMenuItem v-if="staff.can?.update" as-child>
                <Link :href="edit(staff)">
                    <Pencil class="mr-2 size-4" />
                    Edit
                </Link>
            </DropdownMenuItem>

            <DropdownMenuSeparator />

            <DropdownMenuItem
                v-if="staff.can?.delete"
                class="text-destructive focus:text-destructive"
                @click="emit('delete', staff)"
            >
                <Trash class="mr-2 size-4" />
                Delete
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>
