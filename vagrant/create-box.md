# create vagrant box

## Install Linux in VirtualBox

- VirtualBox Network adapter 1 : NAT
- Networking IPv4 Setting : DHCP
- Root Password: vagrant
- User Creation

```
User name: vagrant
Password: vagrant
[x] Make this user administrator
```

## Post installation
- yum update / apt update, apt upgrade
- [install VirtualBox Guest Additions](../virtualbox/guest-additions.md)
- import `authorized_keys` from [vagrant.pub](https://raw.githubusercontent.com/hashicorp/vagrant/master/keys/vagrant.pub)

- run `visudo`

```
vagrant ALL=(ALL) NOPASSWD: ALL
```

- edit `/etc/ssh/sshd_config`

```
UseDNS: no
```

- `shutdown`

## package

```console
$ VBoxManage list vms
"vagrant-oel8" {cc5b...}

$ vagrant package --base vagrant-oel8
==> vagrant-oel8: Exporting VM...
==> vagrant-oel8: Compressing package to: /Users/supasin/package.box

$ ls -lh package.box
-rw-r--r--  1 supasin  staff   865M Oct  4 21:09 package.box
```

## add box into vagrant

```console
$ vagrant box list
There are no installed boxes! Use `vagrant box add` to add some.

$ vagrant box add oel8 package.box
==> box: Box file was not detected as metadata. Adding it directly...
==> box: Adding box 'oel8' (v0) for provider:
    box: Unpacking necessary files from: file:///Users/supasin/package.box
==> box: Successfully added box 'oel8' (v0) for 'virtualbox'!

$ vagrant box list
oel8 (virtualbox, 0)

$ rm -f package.box
```
