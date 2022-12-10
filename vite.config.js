const {resolve} = require('path');
import vue from '@vitejs/plugin-vue';

export default ({command}) => ({
    base: command === 'serve' ? '' : '/dist/',
    publicDir: './public',
    build: {
        manifest: true,
        outDir: resolve(__dirname, 'public/build'),
        rollupOptions: {
            input: 'resources/js/app.js',
        },
    },

    plugins: [
        vue()
    ],

    resolve: {
        alias: {
            '@': resolve('./resources/js'),
        },
    },

    server: {
        hmr: {
            host: 'localhost',
        }
    }
});


