<script setup lang="ts">
import { onMounted } from 'vue';
import AuthLayout from '@/layouts/auth/AuthCardLayout.vue';

const { title = '', description = '' } = defineProps<{
    title?: string;
    description?: string;
}>();

onMounted(() => {
    document.documentElement.classList.remove('dark');
    document.documentElement.style.colorScheme = 'light';
});
</script>

<template>
    <AuthLayout :title="title" :description="description">
        <slot />
    </AuthLayout>
</template>
