# set time zone

```console
$ timedatectl
                      Local time: Fri 2019-08-23 01:34:14 UTC
                  Universal time: Fri 2019-08-23 01:34:14 UTC
                        RTC time: Fri 2019-08-23 01:34:15
                       Time zone: Etc/UTC (UTC, +0000)
       System clock synchronized: yes
systemd-timesyncd.service active: yes
                 RTC in local TZ: no

$ date
Fri Aug 23 01:34:54 UTC 2019
```

```console
$ timedatectl list-timezones
Africa/Accra
Africa/Addis_Ababa
Africa/Algiers
...
Asia/Bangkok
...
UTC
```

```console
$ sudo timedatectl set-timezone Asia/Bangkok
```

```console
$ timedatectl
                      Local time: Fri 2019-08-23 08:35:17 +07
                  Universal time: Fri 2019-08-23 01:35:17 UTC
                        RTC time: Fri 2019-08-23 01:35:18
                       Time zone: Asia/Bangkok (+07, +0700)
       System clock synchronized: yes
systemd-timesyncd.service active: yes
                 RTC in local TZ: no
```

```console
$ date
Fri Aug 23 08:35:18 +07 2019
```

