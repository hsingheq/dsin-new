import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import mkcert from 'vite-plugin-mkcert'

export default defineConfig({
    // server: {
    //     host: '127.0.0.1:8000',
	// 	https: false
    //   },
    plugins: [
        vue(),
       
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
		// mkcert()
    ],
    // build: {
    //     commonjsOptions: {
    //         esmExternals: true 
    //      },
    // },
});
