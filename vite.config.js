import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build',
        rollupOptions: {
            input: {
                // CSS
                styles: 'resources/css/app.css',

                // JS
                main: 'resources/js/app.js',
            },
        },
    },
});
