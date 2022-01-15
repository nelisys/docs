# docker-compose

## docker-compose.yml

```
# docker-compose.yml
version: "3.9"
services:
  my-php-fpm:
    image: my-php-fpm
    ports:
      - "9000:9000"
    volumes:
      - "/var/www/html:/var/www/html"
```

## docker-compose systemd

```
# /etc/systemd/system/docker-compose.service
[Unit]
Description=Docker Compose Service
Requires=docker.service
After=docker.service

[Service]
Type=oneshot
RemainAfterExit=yes
WorkingDirectory=/home/admin/my-php-fpm
ExecStart=/usr/local/bin/docker-compose up -d
ExecStop=/usr/local/bin/docker-compose down
TimeoutStartSec=0

[Install]
WantedBy=multi-user.target
```

```
$ sudo systemctl start docker-compose

$ sudo systemctl enable docker-compose
```
