# nginx

```
$ sudo apt install -y nginx
```

## Laravel

```
# /etc/nginx/sites-enabled/default
server {
    location / {
        #try_files $uri $uri/ =404;
        try_files $uri $uri/ /index.php?$query_string;
    }
```

## Errors

### client intended to send too large body

```
# /etc/nginx/nginx.conf
...
http {
    ...
    client_max_body_size 64M;
    ...
}
```

```
$ sudo systemctl restart nginx
```
