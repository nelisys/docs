# config

## cypress.config.js

```
export default defineConfig({
  video: false,
  defaultCommandTimeout: 4000,
  e2e: {
    baseUrl: 'http://example.test',
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
  },
}
```
