import {defineConfig} from 'vite'
import vue from '@vitejs/plugin-vue'
import {resolve, dirname} from 'node:path'
import {fileURLToPath} from 'url'
import VueI18nPlugin from '@intlify/unplugin-vue-i18n/vite'

// https://vitejs.dev/config/
export default defineConfig({
  server: {
    port: 3006, // Change this value to your desired port
    host: '0.0.0.0'
  },
  build: {
    sourcemap: true,
  },
  plugins: [
    vue(),
    VueI18nPlugin({
      include: resolve(dirname(fileURLToPath(import.meta.url)), './src/i18n/locales/**'),
    }),
  ],
})
