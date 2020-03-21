# IPsec

## install

```console
$ sudo yum install -y libreswan
```

default configuration

```console
$ ls -ld /etc/ipsec.*
-rw-r--r--. 1 root root 1071 Nov 11 22:34 /etc/ipsec.conf
drwx------. 3 root root   22 Mar 19 14:28 /etc/ipsec.d
-rw-------. 1 root root   31 Nov 11 22:34 /etc/ipsec.secrets

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
drwx------. 2 root root 120 Mar 19 14:28 policies

$ sudo ls -l /etc/ipsec.d/policies
-rw-r--r--. 1 root root 395 Nov 11 22:34 block
-rw-r--r--. 1 root root 416 Nov 11 22:34 clear
-rw-r--r--. 1 root root 946 Nov 11 22:34 clear-or-private
-rw-r--r--. 1 root root 472 Nov 11 22:34 portexcludes.conf
-rw-r--r--. 1 root root 614 Nov 11 22:34 private
-rw-r--r--. 1 root root 728 Nov 11 22:34 private-or-clear
```

## init NSS database

```console
$ sudo ipsec initnss
Initializing NSS database
```

```console
$ sudo ls -l /etc/ipsec.d
-rw-------. 1 root root 28672 Mar 19 14:31 cert9.db
-rw-------. 1 root root 36864 Mar 19 14:31 key4.db
-rw-------. 1 root root   423 Mar 19 14:31 pkcs11.txt
drwx------. 2 root root   120 Mar 19 14:28 policies
```

## start service

```console
$ sudo systemctl start ipsec

$ systemctl status ipsec
● ipsec.service - Internet Key Exchange (IKE) Protocol Daemon for IPsec
   Loaded: loaded (/usr/lib/systemd/system/ipsec.service; disabled; vendor preset: disabled)
   Active: active (running) since Thu 2020-03-19 14:32:23 +07; 11s ago
```

## firewall rules

```console
$ sudo firewall-cmd --add-service=ipsec
success

$ sudo firewall-cmd --add-rich-rule='rule protocol value="esp" accept'

$ sudo firewall-cmd --runtime-to-permanent
```

## site to site

### left

```console
$ sudo ipsec newhostkey --output /etc/ipsec.d/hostkey.secrets
Generated RSA key pair with CKAID a4b0f0... was stored in the NSS database

$ sudo ls -l /etc/ipsec.d/
-rw-------. 1 root root 28672 Mar 19 14:34 cert9.db
-rw-------. 1 root root  1829 Mar 19 14:34 hostkey.secrets
-rw-------. 1 root root 36864 Mar 19 14:34 key4.db
-rw-------. 1 root root   423 Mar 19 14:31 pkcs11.txt
drwx------. 2 root root   120 Mar 19 14:28 policies

$ sudo ipsec showhostkey --left --ckaid a4b0f0...
    # rsakey AwEAAbHzz
    leftrsasigkey=0sAwEA...
```

### right

```console
$ sudo ipsec newhostkey --output /etc/ipsec.d/hostkey.secrets
****
Generated RSA key pair with CKAID 5a0811f8... was stored in the NSS database

$ sudo ls -l /etc/ipsec.d/
***

$ sudo ipsec showhostkey --right --ckaid 5a0811f8...
***
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
