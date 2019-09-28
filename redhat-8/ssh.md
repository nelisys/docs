# ssh

## ssh-copy-id

```console
$ ssh-copy-id supasin@192.168.1.10
/usr/bin/ssh-copy-id: INFO: Source of key(s) to be installed: "/Users/supasin/.ssh/id_rsa.pub"
/usr/bin/ssh-copy-id: INFO: attempting to log in with the new key(s), to filter out any that are already installed
/usr/bin/ssh-copy-id: INFO: 1 key(s) remain to be installed -- if you are prompted now it is to install the new keys
supasin@192.168.1.10's password:

Number of key(s) added:        1

Now try logging into the machine, with:   "ssh 'supasin@192.168.1.10'"
and check to make sure that only the key(s) you wanted were added.
```

`ssh` without entering password

```console
$ ssh supasin@192.168.1.10
Last login: Sat Sep 28 10:28:53 2019 from 192.168.1.101
[supasin@rh8 ~]$

[supasin@rh8 ~]$ ls -l .ssh/
total 4
-rw-------. 1 supasin supasin 395 Sep 28 10:29 authorized_keys
```

