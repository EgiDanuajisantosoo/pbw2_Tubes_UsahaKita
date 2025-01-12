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
    // server: {
    //     host: '0.0.0.0', // Agar dapat diakses oleh perangkat lain
    //     port: 3000,       // Port default, sesuaikan jika diperlukan
    //     strictPort: true, // Error jika port sedang digunakan
    //     hmr: {
    //         host: '192.168.1.4', // Ganti dengan IP lokal Anda
    //     },
    // },
    // server: {
    //     host: '0.0.0.0', // Mengizinkan akses dari semua perangkat
    //     port: 8000,       // Port default yang sama dengan yang Anda gunakan di Ngrok
    //     strictPort: true, // Error jika port sedang digunakan
    //     hmr: {
    //         host: '52.220.121.212', // Ganti dengan IP publik dari Ngrok (contoh: 52.220.121.212)
    //         protocol: 'ws',      // Gunakan WebSocket untuk HMR
    //         port: 8000,          // Pastikan port sama dengan server
    //     },
    // },
    // server: {
    //     host: '0.0.0.0', // Agar server mendengarkan koneksi dari semua perangkat
    //     port: 8000,
    //     strictPort: true,
    //     hmr: {
    //         host: 'https://747f-2404-8000-1024-4801-ad1c-b8a5-139c-1cd7.ngrok-free.app', // Host dari Dev Tunnels
    //         protocol: 'https', // Gunakan protokol sesuai dengan Dev Tunnels
    //         clientPort: 80
    //     },
    // },

});
