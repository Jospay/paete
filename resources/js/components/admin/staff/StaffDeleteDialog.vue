<script setup lang="ts">
import { router } from '@inertiajs/vue3';

import { LoaderCircle } from '@lucide/vue';
import { ref } from 'vue';

import {
    AlertDialog,
    AlertDialogAction,
    AlertDialogCancel,
    AlertDialogContent,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle,
} from '@/components/ui/alert-dialog';

import { Button } from '@/components/ui/button';

import { destroy } from '@/routes/admin/staff';

import type { User } from '@/types';

interface Props {
    open: boolean;
    staff: User | null;
}

const props = defineProps<Props>();

const emit = defineEmits<{
    'update:open': [value: boolean];
}>();

const processing = ref(false);

function close() {
    emit('update:open', false);
}

function remove() {
    if (!props.staff) {
        return;
    }

    processing.value = true;

    router.delete(destroy(props.staff), {
        preserveScroll: true,

        onFinish: () => {
            processing.value = false;
        },

        onSuccess: () => {
            close();
        },
    });
}
</script>

<template>
    <AlertDialog :open="open" @update:open="emit('update:open', $event)">
        <AlertDialogContent>
            <AlertDialogHeader>
                <AlertDialogTitle> Delete Staff Member </AlertDialogTitle>

                <AlertDialogDescription>
                    Are you sure you want to delete
                    <strong>{{ staff?.full_name }}</strong
                    >? This action cannot be undone.
                </AlertDialogDescription>
            </AlertDialogHeader>

            <AlertDialogFooter>
                <AlertDialogCancel :disabled="processing">
                    Cancel
                </AlertDialogCancel>

                <AlertDialogAction as-child>
                    <Button
                        variant="destructive"
                        :disabled="processing"
                        @click="remove"
                    >
                        <LoaderCircle
                            v-if="processing"
                            class="mr-2 size-4 animate-spin"
                        />

                        Delete
                    </Button>
                </AlertDialogAction>
            </AlertDialogFooter>
        </AlertDialogContent>
    </AlertDialog>
</template>
