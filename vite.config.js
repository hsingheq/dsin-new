import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import mkcert from 'vite-plugin-mkcert'

export default defineConfig({
    server: {
        host: 'dsinagility.cw',
		https: true
      },
    plugins: [
        vue(),
       
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
		mkcert()
    ],
    // build: {
    //     commonjsOptions: {
    //         esmExternals: true 
    //      },
    // },
});
