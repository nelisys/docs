# nginx

```
$ sudo apt install -y nginx
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
