import { defineConfig, loadEnv } from "vite";
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
            },
        },
        plugins: [
            laravel({
                input: ["./resources/js/app.js"],
                refresh: true,
            }),
            smallstep({
                steppath: process.env.VITE_STEPPATH,
            }),
        ],
    };
});
