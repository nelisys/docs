# create vm

## init vm

```console
$ mkdir vagrant/oel8
$ cd vagrant/oel8

$ vagrant init oel8
A `Vagrantfile` has been placed in this directory. You are now
ready to `vagrant up` your first virtual environment! Please read
the comments in the Vagrantfile as well as documentation on
`vagrantup.com` for more information on using Vagrant.

$ ls -l
total 8
-rw-r--r--  1 supasin  staff  3011 Oct  4 21:12 Vagrantfile

$ cat Vagrantfile
Vagrant.configure("2") do |config|
  config.vm.box = "oel8"
  ...
end
```

## vagrant up

```console
$ vagrant up
Bringing machine 'default' up with 'virtualbox' provider...
==> default: Importing base box 'oel8'...
==> default: Matching MAC address for NAT networking...
==> default: Setting the name of the VM: oel8_default_1570...
Vagrant is currently configured to create VirtualBox synced folders with
the `SharedFoldersEnableSymlinksCreate` option enabled. If the Vagrant
guest is not trusted, you may want to disable this option. For more
information on this option, please refer to the VirtualBox manual:

  https://www.virtualbox.org/manual/ch04.html#sharedfolders

This option can be disabled globally with an environment variable:

  VAGRANT_DISABLE_VBOXSYMLINKCREATE=1

or on a per folder basis within the Vagrantfile:

  config.vm.synced_folder '/host/path', '/guest/path', SharedFoldersEnableSymlinksCreate: false
==> default: Clearing any previously set network interfaces...
==> default: Preparing network interfaces based on configuration...
    default: Adapter 1: nat
==> default: Forwarding ports...
    default: 22 (guest) => 2222 (host) (adapter 1)
==> default: Booting VM...
==> default: Waiting for machine to boot. This may take a few minutes...
    default: SSH address: 127.0.0.1:2222
    default: SSH username: vagrant
    default: SSH auth method: private key
    default:
    default: Vagrant insecure key detected. Vagrant will automatically replace
    default: this with a newly generated keypair for better security.
    default:
    default: Inserting generated public key within guest...
==> default: Machine booted and ready!
==> default: Checking for guest additions in VM...
==> default: Mounting shared folders...
    default: /vagrant => /Users/supasin/vagrant/oel8


$ VBoxManage list vms
"vagrant-oel8" {cc5b...}
"oel8_default_1570..." {17ed...}
```

## vagrant ssh

```
$ vagrant ssh
Last login: Fri Oct  4 21:05:00 2019
[vagrant@vagrant-oel8 ~]$

[vagrant@vagrant-oel8 ~]$ sudo shutdown -h now

$ vagrant status
Current machine states:

default                   poweroff (virtualbox)

The VM is powered off. To restart the VM, simply run `vagrant up`
```
