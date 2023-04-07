

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

const path = require('path');

//import path from 'path'

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
            
    ],

    resolve: {
        alias: {
            ziggy: path.resolve('vendor/tightenco/ziggy/dist/vue.es'),
           //'ziggy':'vendor/tightenco/ziggy/dist/vue',bug

           //"@": path.resolve(__dirname, "resources/js"),
        },
    }
});
