import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/main.css',
                'resources/css/grape/grape.css',
                'resources/js/grape/content-grape.js'
            ],
            refresh: true,
        }),
    ],
});
