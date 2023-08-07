# ssh

## ssh to others display warning message

```
macOS ~$ ssh 192.168.1.1
-bash: warning: setlocale: LC_CTYPE: cannot change locale (UTF-8): No such file or directory
```

comment out `Host *` and `SendEnv LANG LC_*` lines

```
$ sudo vi /private/etc/ssh/ssh_config
...
#Host *
#   SendEnv LANG LC_*
```

## no matching host key type found

Unable to negotiate with 192.168.1.1 port 22: no matching host key type found. Their offer: ssh-rsa,ssh-dss

```
ssh -oHostKeyAlgorithms=+ssh-dss 192.168.1.1
```

## no matching key exchange method found

Unable to negotiate with 192.168.1.1 port 22: no matching key exchange method found. Their offer: diffie-hellman-group-exchange-sha1,diffie-hellman-group1-sha1

```
ssh -o KexAlgorithms=diffie-hellman-group1-sha1 192.168.1.1
```

## no matching cipher found

```
Unable to negotiate with 192.168.1.1 port 22: no matching cipher found. Their offer: aes128-cbc,3des-cbc,blowfish-cbc,cast128-cbc,arcfour,aes192-cbc,aes256-cbc,rijndael-cbc@lysator.liu.se

```
ssh -oCiphers=+aes128-cbc 192.168.1.1
```
