# FortiClient

## Installation on Ubuntu 20.04

Add GPG key.

```
$ wget -O - https://repo.fortinet.com/repo/6.4/ubuntu/DEB-GPG-KEY | sudo apt-key add -
```

Add repo in '/etc/apt/sources.list'

```
deb [arch=amd64] https://repo.fortinet.com/repo/6.4/ubuntu/ /bionic multiverse
```

```
$ sudo apt update

$ sudo apt install forticlient
```

## Running

```
$ sudo /opt/forticlient/vpn -s <vpn-server-ip> -u <username> -p
password:
State: Connecting
State: Logging in
State: Waiting user confirm remote certificate

=====================
Confirmation Required
---------------------
You are connecting to an untrusted server, which could put your confidential information at risk. Would you like to connect to this server?

Hostname: <vpn-server-ip>

Reason: X509 verify certificate failed

Certificate:
    Subject name: /C=US/ST=California/L=Sunnyvale/O=Fortinet/OU=Certificate ...
        Fingerprint (SHA1): F2:80:...

=====================
Confirm (y/n) [default=n]:Confirm (y/n) [default=n]:y
State: Logging in
State: Configuring tunnel
State: Connected
```
