import { defineConfig } from 'vite'

export default defineConfig({

  // Configuration options
  server: {
    fs: {
      allow: [
        '..',
        'login-form'
      ]
    }
  }
})