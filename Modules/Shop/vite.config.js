const dotenvExpand = require("dotenv-expand");
dotenvExpand(
    require("dotenv").config({ path: "../../.env" /*, debug: true*/ })
);

import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    build: {
        outDir: "../../public/build-shop",
        emptyOutDir: true,
        manifest: true,
    },
    plugins: [
        laravel({
            publicDirectory: "../../public",
            buildDirectory: "build-shop",
            input: [
                __dirname + "/Resources/assets/sass/app.scss",
                __dirname + "/Resources/assets/js/app.js",
            ],
            refresh: true,
        }),
    ],
    // server: {
    //     host: "0.0.0.0", // Membuka akses dari luar localhost
    //     port: 5173, // Port yang digunakan
    //     open: true, // Opsional, ini membuka browser secara otomatis
    // },
});
