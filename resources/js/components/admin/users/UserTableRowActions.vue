<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import {
    Ellipsis,
    Eye,
    Pencil,
    Trash,
} from '@lucide/vue'

import { Button } from '@/components/ui/button'

import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu'

import {
    edit,
    show,
} from '@/routes/admin/users'

import type { User } from '@/types'

defineProps<{
    user: User
}>()

const emit = defineEmits<{
    delete: [user: User]
}>()
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger as-child>
            <Button
                variant="ghost"
                size="icon"
            >
                <Ellipsis class="size-4" />
            </Button>
        </DropdownMenuTrigger>

        <DropdownMenuContent align="end">
            <DropdownMenuItem
                v-if="user.can?.view"
                as-child
            >
                <Link :href="show(user)">
                    <Eye class="mr-2 size-4" />
                    View
                </Link>
            </DropdownMenuItem>

            <DropdownMenuItem
                v-if="user.can?.update"
                as-child
            >
                <Link :href="edit(user)">
                    <Pencil class="mr-2 size-4" />
                    Edit
                </Link>
            </DropdownMenuItem>

            <DropdownMenuSeparator />

            <DropdownMenuItem
                v-if="user.can?.delete"
                class="text-destructive focus:text-destructive"
                @click="emit('delete', user)"
            >
                <Trash class="mr-2 size-4" />
                Delete
            </DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>
