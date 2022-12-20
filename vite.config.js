import { defineConfig, loadEnv } from 'vite';

import fs from 'fs';
import path from 'path';

import laravel from 'laravel-vite-plugin';
import restart from 'vite-plugin-restart';

async function __https({ crt, key }) {
    let https = null;
    try {
        https = {
            cert: fs.readFileSync(crt),
            key: fs.readFileSync(key),
        };
    } catch (err) {
        await __https({ crt: crt, key: key });
    }
    return https;
}

export default defineConfig(async ({ mode }) => {
    process.env = {
        ...process.env,
        ...loadEnv(mode, process.cwd(), 'VITE_SERVER'),
    };

    const https = await __https({
        crt: process.env.VITE_SERVER_CRT,
        key: process.env.VITE_SERVER_KEY,
    });

    return {
        server: {
            host: true,
            port: 5173,
            https: https,
            hmr: {
                host: process.env.VITE_SERVER_HMR,
                clientPort: 443,
            },
        },
        resolve: {
            alias: {
                '~': path.resolve(__dirname, './node_modules'),
                '@': path.resolve(__dirname, './resources'),
            },
        },
        plugins: [
            restart({
                restart: [
                    path.relative(__dirname, process.env.VITE_SERVER_CRT),
                ],
            }),
            laravel({
                input: ['./resources/js/main.js'],
                refresh: true,
            }),
        ],
    };
});
