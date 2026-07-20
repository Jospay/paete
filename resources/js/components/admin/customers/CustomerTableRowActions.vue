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

import { edit, show } from '@/routes/admin/customers';

import type { User } from '@/types';

defineProps<{
    customer: User;
}>();

const emit = defineEmits<{
    delete: [customer: User];
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
            <DropdownMenuItem v-if="customer.can?.view" as-child>
                <Link :href="show(customer)">
                    <Eye class="mr-2 size-4" />
                    View
                </Link>
            </DropdownMenuItem>

            <DropdownMenuItem v-if="customer.can?.update" as-child>
                <Link :href="edit(customer)">
                    <Pencil class="mr-2 size-4" />
                    Edit
                </Link>
            </DropdownMenuItem>

            <DropdownMenuSeparator />

            <DropdownMenuItem
                v-if="customer.can?.delete"
                class="text-destructive focus:text-destructive"
                @click="emit('delete', customer)"
            >
                <Trash class="mr-2 size-4" />
                Delete
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>
