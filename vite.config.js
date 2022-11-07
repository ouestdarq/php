import { defineConfig, loadEnv } from 'vite';

import fs from 'fs';
import path from 'path';

import laravel from 'laravel-vite-plugin';
import restart from 'vite-plugin-restart';

async function getServerConf() {
    let https = null;

    try {
        https = {
            key: fs.readFileSync(process.env.VITE_SERVER_KEY),
            cert: fs.readFileSync(process.env.VITE_SERVER_CERT),
        };
    } catch (err) {
        console.log(err);
        await getServerConf();
    }

    let hmr = { host: process.env.VITE_SERVER_HMR };
    let certpath = process.env.VITE_SERVER_CERT;

    return { https, hmr, certpath };
}

export default defineConfig(async ({ mode }) => {
    process.env = {
        ...process.env,
        ...loadEnv(mode, process.cwd(), 'VITE_SERVER'),
    };

    const { https, hmr, certpath } = await getServerConf();

    return {
        server: {
            host: true,
            port: 5173,
            https: https,
            hmr: hmr,
        },
        resolve: {
            alias: {
                '~': path.resolve(__dirname, './node_modules'),
                '@': path.resolve(__dirname, './resources'),
            },
        },
        plugins: [
            restart({
                restart: [certpath],
            }),
            laravel({
                input: ['./resources/js/main.js'],
                refresh: true,
            }),
        ],
    };
});
