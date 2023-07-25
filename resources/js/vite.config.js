import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    laravel(['resources/css/app.css',
              'resources/js/app.jsx',]),
    react(),
  ],
})
