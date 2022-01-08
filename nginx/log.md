# Log

## Turn off access log for some file extensions

```
server {
    // ...
    location ~* \.(js|css|ico|map)$ {
        access_log off;
    }

```
