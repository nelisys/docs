# nginx

## install nginx

```console
$ sudo apt install nginx
```

## Status

```console
$ systemctl status nginx
● nginx.service - A high performance web server and a reverse proxy server
   Loaded: loaded (/lib/systemd/system/nginx.service; enabled; vendor preset: enabled)
   Active: active (running) since Sun 2019-12-01 14:05:50 +07; 1min 0s ago
     Docs: man:nginx(8)
 Main PID: 2246 (nginx)
    Tasks: 5 (limit: 2200)
   Memory: 4.8M
   CGroup: /system.slice/nginx.service
           ├─2246 nginx: master process /usr/sbin/nginx -g daemon on; master_process on;
           ├─2247 nginx: worker process
           ├─2248 nginx: worker process
           ├─2249 nginx: worker process
           └─2250 nginx: worker process

Dec 01 14:05:49 pix7 systemd[1]: Starting A high performance web server and a reverse proxy server...
Dec 01 14:05:50 pix7 systemd[1]: Started A high performance web server and a reverse proxy server.
```
