import '../css/app.css';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import type { DefineComponent } from 'vue';
import { createApp, h } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import AuthLayout from '@/layouts/AuthLayout.vue';
import SettingsLayout from '@/layouts/settings/Layout.vue';
import { initializeTheme } from './composables/useAppearance';
import LandingLayout from '@/layouts/LandingLayout.vue';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),

    resolve: async (name) => {
        const page = await resolvePageComponent(
            `./pages/${name}.vue`,
            import.meta.glob<DefineComponent>('./pages/**/*.vue'),
        );

        // Only assign a layout if the page doesn't already define one
        if (!page.default.layout) {
            switch (true) {
                // Landing page
                case name === 'Welcome':
                    page.default.layout = LandingLayout;
                    break;

                // Authentication pages
                case name.startsWith('auth/'):
                    page.default.layout = AuthLayout;
                    break;

                // Settings pages
                case name.startsWith('settings/'):
                    page.default.layout = [AppLayout, SettingsLayout];
                    break;

                // Default application pages
                default:
                    page.default.layout = AppLayout;
            }
        }

        return page;
    },

    setup({ el, App, props, plugin }) {
        createApp({
            render: () => h(App, props),
        })
            .use(plugin)
            .mount(el);
    },

    progress: {
        color: '#4B5563',
    },
});

// This will set light / dark mode on page load...
initializeTheme();
