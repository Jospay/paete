<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import type { Paginated } from '@/types'

import {
    Pagination,
    PaginationContent,
    PaginationEllipsis,
    PaginationFirst,
    PaginationItem,
    PaginationLast,
    PaginationNext,
    PaginationPrevious,
} from '@/components/ui/pagination'

defineProps<{
    users: Paginated<unknown>
}>()
</script>

<template>
    <div
        class="flex items-center justify-between py-4"
    >
        <div
            class="text-sm text-muted-foreground"
        >
            Showing
            {{ users.meta.from ?? 0 }}
            to
            {{ users.meta.to ?? 0 }}
            of
            {{ users.meta.total }}
            users
        </div>

        <Pagination
            :items-per-page="users.meta.per_page"
            :total="users.meta.total"
            :default-page="users.meta.current_page"
        >
            <PaginationContent>
                <PaginationFirst
                    v-if="users.links.first"
                    as-child
                >
                    <Link :href="users.links.first" />
                </PaginationFirst>

                <PaginationPrevious
                    v-if="users.links.prev"
                    as-child
                >
                    <Link :href="users.links.prev" />
                </PaginationPrevious>

                <template
                    v-for="link in users.meta.links"
                    :key="link.label"
                >
                    <PaginationItem
                        v-if="link.page"
                        :value="link.page"
                        :is-active="link.active"
                        as-child
                    >
                        <Link :href="link.url!">
                            {{ link.page }}
                        </Link>
                    </PaginationItem>

                    <PaginationEllipsis
                        v-else
                    />
                </template>

                <PaginationNext
                    v-if="users.links.next"
                    as-child
                >
                    <Link :href="users.links.next" />
                </PaginationNext>

                <PaginationLast
                    v-if="users.links.last"
                    as-child
                >
                    <Link :href="users.links.last" />
                </PaginationLast>
            </PaginationContent>
        </Pagination>
    </div>
</template>
