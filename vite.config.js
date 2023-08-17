import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import postcssPlugin from 'vite-plugin-postcss';



export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],

    plugins: [
        postcssPlugin(),
        // autres plugins si vous en avez
      ],
      // autres configurations
});
