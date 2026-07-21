<script setup lang="ts">
import type { Component } from 'vue';

import {
    Card,
    CardDescription,
    CardFooter,
    CardHeader,
    CardTitle,
} from '@/components/ui/card';

defineProps<{
    title: string;
    value: string | number;
    description?: string;
    footer?: string;
    icon?: Component;
}>();
</script>

<template>
    <Card class="@container/card">
        <CardHeader>
            <div class="flex items-center justify-between">
                <div>
                    <CardDescription>
                        {{ title }}
                    </CardDescription>

                    <CardTitle
                        class="mt-2 text-2xl font-semibold tabular-nums @[250px]/card:text-3xl"
                    >
                        {{ value }}
                    </CardTitle>
                </div>

                <component
                    :is="icon"
                    v-if="icon"
                    class="size-10 text-muted-foreground"
                />
            </div>
        </CardHeader>

        <CardFooter
            v-if="description || footer"
            class="flex-col items-start gap-1.5 text-sm"
        >
            <div v-if="description" class="font-medium">
                {{ description }}
            </div>

            <div v-if="footer" class="text-muted-foreground">
                {{ footer }}
            </div>
        </CardFooter>
    </Card>
</template>
