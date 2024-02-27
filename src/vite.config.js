import { defineConfig, loadEnv } from "vite";
import vue from "@vitejs/plugin-vue";
import laravel from "laravel-vite-plugin";
import smallstep from "vite-plugin-smallstep";
import path from "path";

export default defineConfig(async ({ mode }) => {
    return {
        server: {
            host: true,
            port: 5173,
            hmr: {
                host: process.env.VITE_HMR_HOST,
                clientPort: process.env.VITE_HMR_CLIENTPORT,
            },
        },
        resolve: {
            alias: {
                "~": path.resolve(__dirname, "./node_modules"),
                "@": path.resolve(__dirname, "./resources"),
                vue: "vue/dist/vue.esm-bundler.js",
            },
        },
        plugins: [
            vue(),
            laravel({
                input: [
                    // path.resolve(__dirname, "./resources/js/app.js"),
                    path.resolve(__dirname, "./resources/js/login.js"),
                ],
                refresh: true,
            }),
            smallstep({
                steppath: process.env.VITE_STEPPATH,
            }),
        ],
    };
});
