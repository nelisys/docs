# systemd

`my-service.service`

```
[Unit]
Description=My service
After=network.target

[Service]
ExecStart=/usr/local/bin/my-service.service
WorkingDirectory=/usr/local/bin
StandardOutput=inherit
StandardError=inherit
Restart=always
User=pi

[Install]
WantedBy=multi-user.target
```

```
$ sudo cp my-service.service /etc/systemd/system/my-service.service
```
