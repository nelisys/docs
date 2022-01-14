# nginx configuration

```
# /etc/nginx/sites-enabled/default
server {
    // ...

    location / {
        #try_files $uri $uri/ =404;
        try_files $uri $uri/ /index.php?$query_string;
    }
```
