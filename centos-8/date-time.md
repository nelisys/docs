# set date time

## show date time

```console
$ date
Sat Sep 28 03:04:13 UTC 2019

$ timedatectl
               Local time: Sat 2019-09-28 03:04:00 UTC
           Universal time: Sat 2019-09-28 03:04:00 UTC
                 RTC time: Sat 2019-09-28 03:03:59
                Time zone: UTC (UTC, +0000)
System clock synchronized: yes
              NTP service: active
          RTC in local TZ: no
```

## set timezone

```console
$ sudo timedatectl set-timezone Asia/Bangkok

$ date
Sat Sep 28 10:04:49 +07 2019

$ timedatectl
               Local time: Sat 2019-09-28 10:04:53 +07
           Universal time: Sat 2019-09-28 03:04:53 UTC
                 RTC time: Sat 2019-09-28 03:04:51
                Time zone: Asia/Bangkok (+07, +0700)
System clock synchronized: yes
              NTP service: active
          RTC in local TZ: no
```
