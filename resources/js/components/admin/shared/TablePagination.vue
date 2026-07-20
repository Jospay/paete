<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

import {
    Pagination,
    PaginationContent,
    PaginationEllipsis,
    PaginationFirst,
    PaginationItem,
    PaginationLast,
    PaginationNext,
    PaginationPrevious,
} from '@/components/ui/pagination';

import type { Paginated } from '@/types';

withDefaults(
    defineProps<{
        items: Paginated<unknown>;
        itemLabel?: string;
    }>(),
    {
        itemLabel: 'users',
    },
);
</script>

<template>
    <div class="flex items-center justify-between py-4">
        <div class="text-sm text-muted-foreground">
            Showing
            {{ items.meta.from ?? 0 }}
            to
            {{ items.meta.to ?? 0 }}
            of
            {{ items.meta.total }}
            {{ itemLabel }}
        </div>

        <Pagination
            :items-per-page="items.meta.per_page"
            :total="items.meta.total"
            :default-page="items.meta.current_page"
        >
            <PaginationContent>
                <PaginationFirst v-if="items.links.first" as-child>
                    <Link :href="items.links.first" />
                </PaginationFirst>

                <PaginationPrevious v-if="items.links.prev" as-child>
                    <Link :href="items.links.prev" />
                </PaginationPrevious>

                <template v-for="link in items.meta.links" :key="link.label">
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

                    <PaginationEllipsis v-else />
                </template>

                <PaginationNext v-if="items.links.next" as-child>
                    <Link :href="items.links.next" />
                </PaginationNext>

                <PaginationLast v-if="items.links.last" as-child>
                    <Link :href="items.links.last" />
                </PaginationLast>
            </PaginationContent>
        </Pagination>
    </div>
</template>
