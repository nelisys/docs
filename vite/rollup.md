# rollup

## chunks

```
export default defineConfig({
    build: {
        // chunkSizeWarningLimit: 1000,
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: [
                        'axios',
                        'chart.js',
                        'moment',
                        'react',
                        'react-datepicker',
                        'react-dom',
                    ],
                },
            },
        },
    },
```
