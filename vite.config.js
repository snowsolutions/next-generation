import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/lib/bootstrap/css/bootstrap.min.css',
                'resources/lib/bootstrap/js/bootstrap.bundle.min.js',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/table-utils.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '$': 'jQuery'
        },
    },
});
