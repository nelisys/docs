# Samba 4 Configure AD DC

```console
$ sudo hostnamectl set-hostname samba4.example.com

$ sudo apt -y install samba krb5-config winbind smbclient
Default Kerberos version 5 realm: EXAMPLE.COM
Kerberos servers for your realm: samba4.example.com
Administrative server for your Kerberos realm: samba4.example.com

$ sudo mv /etc/samba/smb.conf /etc/samba/smb.conf.org

$ sudo samba-tool domain provision

$ sudo cp /var/lib/samba/private/krb5.conf /etc/ 

$ sudo systemctl stop smbd nmbd winbind systemd-resolved 
$ sudo systemctl disable smbd nmbd winbind systemd-resolved 
$ sudo systemctl unmask samba-ad-dc 

$ sudo rm /etc/resolv.conf 
$ sudo vi /etc/resolv.conf
domain example.com
nameserver 127.0.0.1

$ sudo systemctl start samba-ad-dc 
$ sudo systemctl enable samba-ad-dc 

$ sudo samba-tool domain level show 

$ sudo samba-tool user create alice
```

## credits
- [Samba : Samba AD DC : Configure DC](https://www.server-world.info/en/note?os=Ubuntu_18.04&p=samba&f=4)
