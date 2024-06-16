import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from "path";
import vueI18n from "@intlify/vite-plugin-vue-i18n";
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        vueI18n({
            include: path.resolve("lang/**"),
        }),
    ],
    optimizeDeps: {
        include: ["quill", "nouislider"],
    },
    assetsInclude: ["resources/js/assets"],
    resolve: {
        alias: [
            {
                find: /^~(.*)$/,
                replacement: "node_modules/$1",
            }
        ],
    },
});
