# IPsec

## install
```console
$ sudo yum install -y libreswan
```

default configuration

```console
$ ls -ld /etc/ipsec.*
-rw-r--r--. 1 root root 1071 May 25 10:56 /etc/ipsec.conf
drwx------. 3 root root   22 Oct 15 09:23 /etc/ipsec.d
-rw-------. 1 root root   31 May 25 10:56 /etc/ipsec.secrets

$ cat /etc/ipsec.conf
config setup
    plutodebug=none
    virtual_private=%v4:10.0.0.0/8,%v4:192.168.0.0/16,%v4:172.16.0.0/12,%v4:25.0.0.0/8,%v4:100.64.0.0/10,%v6:fd00::/8,%v6:fe80::/10

include /etc/crypto-policies/back-ends/libreswan.config

include /etc/ipsec.d/*.conf

$ sudo cat /etc/ipsec.secrets
include /etc/ipsec.d/*.secrets

$ sudo ls -l /etc/ipsec.d/
total 0
drwx------. 2 root root 120 Oct 15 09:23 policies

$ sudo ls -l /etc/ipsec.d/policies
total 24
-rw-r--r--. 1 root root 395 May 25 10:56 block
-rw-r--r--. 1 root root 416 May 25 10:56 clear
-rw-r--r--. 1 root root 946 May 25 10:56 clear-or-private
-rw-r--r--. 1 root root 472 May 25 10:56 portexcludes.conf
-rw-r--r--. 1 root root 614 May 25 10:56 private
-rw-r--r--. 1 root root 728 May 25 10:56 private-or-clear
```

init NSS database

note: just enter for the password prompt

```console
$ sudo certutil -N -d sql:/etc/ipsec.d
Enter a password which will be used to encrypt your keys.
The password should be at least 8 characters long,
and should contain at least one non-alphabetic character.

Enter new password:
Re-enter password:

$ sudo ls -l /etc/ipsec.d
total 68
-rw-------. 1 root root 28672 Oct 15 10:29 cert9.db
-rw-------. 1 root root 36864 Oct 15 10:29 key4.db
-rw-------. 1 root root   423 Oct 15 10:29 pkcs11.txt
drwx------. 2 root root   120 Oct 15 09:23 policies
```

## start service

```console
$ sudo systemctl start ipsec

$ systemctl status ipsec
● ipsec.service - Internet Key Exchange (IKE) Protocol Daemon for IPsec
   Loaded: loaded (/usr/lib/systemd/system/ipsec.service; disabled; vendor preset: disabled)
      Active: active (running) since Tue 2019-10-15 10:31:54 +07; 16s ago
```

## firewall rules

```console
$ sudo firewall-cmd --add-service=ipsec
success
```

## site to site

### left

```console
$ sudo ipsec newhostkey --output /etc/ipsec.d/hostkey.secrets
Generated RSA key pair with CKAID b49ae187... was stored in the NSS database

$ sudo ls -l /etc/ipsec.d/
total 72
-rw-------. 1 root root 28672 Oct 15 10:33 cert9.db
-rw-------. 1 root root  1642 Oct 15 10:33 hostkey.secrets
-rw-------. 1 root root 36864 Oct 15 10:33 key4.db
-rw-------. 1 root root   423 Oct 15 10:29 pkcs11.txt
drwx------. 2 root root   120 Oct 15 09:23 policies

$ sudo ipsec showhostkey --left --ckaid b49ae187...
    # rsakey AwEAAe6Pk
        leftrsasigkey=0sAwEAAe6Pk...
```

### right

```console
$ sudo ipsec newhostkey --output /etc/ipsec.d/hostkey.secrets
Generated RSA key pair with CKAID 5a0811f8... was stored in the NSS database

$ sudo ls -l /etc/ipsec.d/
total 72
-rw-------. 1 root root 28672 Oct 15 10:35 cert9.db
-rw-------. 1 root root  1822 Oct 15 10:35 hostkey.secrets
-rw-------. 1 root root 36864 Oct 15 10:35 key4.db
-rw-------. 1 root root   423 Oct 15 10:31 pkcs11.txt
drwx------. 2 root root   120 Oct 15 10:05 policies

$ sudo ipsec showhostkey --right --ckaid 5a0811f8...
    # rsakey AwEAAcy2v
        rightrsasigkey=0sAwEAAcy2v...
```

### host to host

```console
$ sudo vi /etc/ipsec.d/my-host-to-host.conf
conn mytunnel
    leftid=@west
    left=192.168.56.1
    leftrsasigkey=0sAwEAAe6Pk...
    rightid=@east
    right=192.168.56.2
    rightrsasigkey=0sAwEAAcy2v...
    authby=rsasig
```

``console
$ sudo ipsec setup start
systemd: ipsec service is already running

$ sudo ipsec auto --add mytunnel
002 added connection description "mytunnel"

$ sudo ipsec auto --up mytunnel
002 "mytunnel" #1: initiating v2 parent SA
133 "mytunnel" #1: initiate
002 | constructed local IKE proposals for mytunnel (IKE SA initiator selecting KE): 1:IKE:ENCR=AES_GCM_C_256;PRF=HMAC_SHA2_512,HMAC_SHA2_256;INTEG=NONE;DH=ECP_256,ECP_384,ECP_521,MODP2048,MODP3072,MODP4096,MODP8192 2:IKE:ENCR=CHACHA20_POLY1305;PRF=HMAC_SHA2_512,HMAC_SHA2_256;INTEG=NONE;DH=ECP_256,ECP_384,ECP_521,MODP2048,MODP3072,MODP4096,MODP8192 3:IKE:ENCR=AES_CBC_256;PRF=HMAC_SHA2_512,HMAC_SHA2_256;INTEG=HMAC_SHA2_512_256,HMAC_SHA2_256_128;DH=ECP_256,ECP_384,ECP_521,MODP2048,MODP3072,MODP4096,MODP8192 4:IKE:ENCR=AES_GCM_C_128;PRF=HMAC_SHA2_512,HMAC_SHA2_256;INTEG=NONE;DH=ECP_256,ECP_384,ECP_521,MODP2048,MODP3072,MODP4096,MODP8192 5:IKE:ENCR=AES_CBC_128;PRF=HMAC_SHA2_256;INTEG=HMAC_SHA2_256_128;DH=ECP_256,ECP_384,ECP_521,MODP2048,MODP3072,MODP4096,MODP8192
133 "mytunnel" #1: STATE_PARENT_I1: sent v2I1, expected v2R1
002 "mytunnel" #1: STATE_PARENT_I1: received unauthenticated v2N_NO_PROPOSAL_CHOSEN - ignored
010 "mytunnel" #1: STATE_PARENT_I1: retransmission; will wait 0.5 seconds for response
002 "mytunnel" #1: STATE_PARENT_I1: received unauthenticated v2N_NO_PROPOSAL_CHOSEN - ignored
```

also start on the right host

```
$ sudo tail /var/log/secure
Oct 15 10:53:13 rh8 pluto[6394]: "mytunnel" #5: negotiated connection [192.168.56.1-192.168.56.1:0-65535 0] -> [192.168.56.2-192.168.56.210-65535 0]
Oct 15 10:53:13 rh8 pluto[6394]: "mytunnel" #5: STATE_V2_IPSEC_R: IPsec SA established tunnel mode {ESP=>0x7fb910e5 <0x10eda1fd xfrm=AES_GCM_16_256-NONE NATOA=none NATD=none DPD=passive} ```

## certificate

```console
$ certutil -S -x -n "ExampleCA" -s "O=Example,CN=MyCA" -k rsa -v 120 -d sql:/etc/ipsec.d -t "CT,," -2
```

## more

```console
$ sudo ipsec showhostkey --list
< 1> RSA keyid: AwEAAe6Pk ckaid: b49ae1879f8b7f40c74c79cfe2e75ff3f90b88b2
```console

on the left
```
$ sudo ipsec whack --trafficstatus
006 #2: "mytunnel", type=ESP, add_time=1571117278, inBytes=924, outBytes=924, id='@east'
```

on the right
```
$ sudo ipsec whack --trafficstatus
006 #5: "mytunnel", type=ESP, add_time=1571117278, inBytes=924, outBytes=924, id='@west'
```

```
$ sudo ipsec status
```
