# openvpn

## Install openvpn

```
$ sudo apt install -y openvpn

$ cd /etc/openvpn/

$ ls -l
total 4
drwxr-xr-x 2 root root    6 May 14 15:25 client
drwxr-xr-x 2 root root    6 May 14 15:25 server
-rwxr-xr-x 1 root root 1301 May 14 15:25 update-resolv-conf
```

## Download easy-rsa

Download EasyRSA 3 from https://github.com/OpenVPN/easy-rsa/releases

```
$ ls -l EasyRSA-unix-v3.0.6.tgz
-rw-r--r-- 1 supasin supasin 40840 Aug  2 13:56 EasyRSA-unix-v3.0.6.tgz

$ tar zxf EasyRSA-unix-v3.0.6.tgz

$ ls -l
total 44
-rw-r--r-- 1 supasin supasin 40840 Aug  2 13:56 EasyRSA-unix-v3.0.6.tgz
drwxrwxr-x 4 supasin supasin  4096 Feb  2 10:41 EasyRSA-v3.0.6

$ mv EasyRSA-v3.0.6 EasyRSA-CA

$ cp -a EasyRSA-CA EasyRSA-Server

$ ls -l
total 48
drwxrwxr-x 4 supasin supasin  4096 Feb  2 10:41 EasyRSA-CA
drwxrwxr-x 4 supasin supasin  4096 Feb  2 10:41 EasyRSA-Server
-rw-r--r-- 1 supasin supasin 40840 Aug  2 13:56 EasyRSA-unix-v3.0.6.tgz


## Build CA

```

$ cd EasyRSA-CA/

[CA]$ cp vars.example vars

[CA]$ vi vars
...
set_var EASYRSA_REQ_COUNTRY "TH"
set_var EASYRSA_REQ_PROVINCE    "Bangkok"
set_var EASYRSA_REQ_CITY    "Phayathai"
set_var EASYRSA_REQ_ORG "My Company"
set_var EASYRSA_REQ_EMAIL   "my@example.com"
set_var EASYRSA_REQ_OU      "IT"
...

[CA]$ ./easyrsa init-pki

Note: using Easy-RSA configuration from: ./vars

init-pki complete; you may now create a CA or requests.
Your newly created PKI dir is: /home/supasin/EasyRSA-CA/pki

```

```
[CA]$ ./easyrsa build-ca nopass

Note: using Easy-RSA configuration from: ./vars

Using SSL: openssl OpenSSL 1.1.1  11 Sep 2018
Generating RSA private key, 2048 bit long modulus (2 primes)
...

Common Name (eg: your user, host, or server name) [Easy-RSA CA]:My CA

CA creation complete and you may now import and sign cert requests.
Your new CA certificate file for publishing is at:
/home/supasin/EasyRSA-CA/pki/ca.crt


[CA]$ ls -l pki/
total 48
-rw------- 1 supasin supasin 1188 Aug  2 14:19 ca.crt
drwx------ 2 supasin supasin 4096 Aug  2 14:19 certs_by_serial
-rw------- 1 supasin supasin    0 Aug  2 14:19 index.txt
drwx------ 2 supasin supasin 4096 Aug  2 14:19 issued
-rw------- 1 supasin supasin 4651 Aug  2 14:18 openssl-easyrsa.cnf
drwx------ 2 supasin supasin 4096 Aug  2 14:19 private
drwx------ 5 supasin supasin 4096 Aug  2 14:19 renewed
drwx------ 2 supasin supasin 4096 Aug  2 14:18 reqs
drwx------ 5 supasin supasin 4096 Aug  2 14:19 revoked
-rw------- 1 supasin supasin 4687 Aug  2 14:19 safessl-easyrsa.cnf
-rw------- 1 supasin supasin    3 Aug  2 14:19 serial
```

## Build Server Certificate

```

[CA]$ cd ../EasyRSA-Server/

[Server]$ ./easyrsa init-pki

init-pki complete; you may now create a CA or requests.
Your newly created PKI dir is: /home/supasin/EasyRSA-Server/pki


[Server]$ ./easyrsa gen-req my-server nopass

Using SSL: openssl OpenSSL 1.1.1  11 Sep 2018

...

Common Name (eg: your user, host, or server name) [my-server]:

Keypair and certificate request completed. Your files are:
req: /home/supasin/EasyRSA-Server/pki/reqs/my-server.req
key: /home/supasin/EasyRSA-Server/pki/private/my-server.key



```

```
[Server]$ sudo cp pki/private/my-server.key /etc/openvpn/

[Server]$ cp pki/reqs/my-server.req ../EasyRSA-CA/

[Server]$ cd ../EasyRSA-CA/

[CA]$ ./easyrsa import-req my-server.req my-server

Note: using Easy-RSA configuration from: ./vars

Using SSL: openssl OpenSSL 1.1.1  11 Sep 2018

The request has been successfully imported with a short name of: my-server
You may now use this name to perform signing operations on this request.


[CA]$ ./easyrsa sign-req server my-server

Note: using Easy-RSA configuration from: ./vars

Using SSL: openssl OpenSSL 1.1.1  11 Sep 2018


You are about to sign the following certificate.
Please check over the details shown below for accuracy. Note that this request
has not been cryptographically verified. Please be sure it came from a trusted
source or that you have verified the request checksum with the sender.

Request subject, to be signed as a server certificate for 1080 days:

subject=
    commonName                = my-server


Type the word 'yes' to continue, or any other input to abort.
  Confirm request details: yes

...

Write out database with 1 new entries
Data Base Updated

Certificate created at: /home/supasin/EasyRSA-CA/pki/issued/my-server.crt


[CA]$ sudo cp pki/issued/my-server.crt /etc/openvpn/


[CA]$ sudo cp pki/ca.crt /etc/openvpn/

```


```

[Server]$ ./easyrsa gen-dh

Using SSL: openssl OpenSSL 1.1.1  11 Sep 2018
Generating DH parameters, 2048 bit long safe prime, generator 2

...

DH parameters of size 2048 created at /home/supasin/EasyRSA-Server/pki/dh.pem

$ sudo cp pki/dh.pem /etc/openvpn/

```

```

$ openvpn --genkey --secret ta.key

$ sudo cp ta.key /etc/openvpn/

```

## configure openvpn

```
$ cd /etc/openvpn/

$ ls -l
total 36
-rw------- 1 root root 1188 Aug  2 14:28 ca.crt
drwxr-xr-x 2 root root 4096 May 14 15:25 client
-rw------- 1 root root  424 Aug  2 14:31 dh.pem
drwxr-xr-x 2 root root 4096 May 14 15:25 server
-rw------- 1 root root  636 Aug  2 14:32 ta.key
-rw------- 1 root root 4614 Aug  2 14:28 my-server.crt
-rw------- 1 root root 1704 Aug  2 14:24 my-server.key
-rwxr-xr-x 1 root root 1301 May 14 15:25 update-resolv-conf

$ sudo cp /usr/share/doc/openvpn/examples/sample-config-files/server.conf.gz .

$ sudo gzip -d server.conf.gz

$ sudo mv server.conf my-server.conf

$ sudo vi my-server.conf
port 1194
proto udp
dev tun
ca ca.crt
cert my-server.crt
key my-server.key  # This file should be kept secret
dh dh.pem
server 10.8.0.0 255.255.255.0
ifconfig-pool-persist /var/log/openvpn/ipp.txt
keepalive 10 120
tls-auth ta.key 0 # This file is secret
key-direction 0
cipher AES-256-CBC
auth SHA256
user nobody
group nogroup
persist-key
persist-tun
status /var/log/openvpn/openvpn-status.log
verb 3
explicit-exit-notify 1

```

## start openvpn server

```
$ sudo systemctl start openvpn@my-server
```

## References

[How To Set Up an OpenVPN Server on Ubuntu 18.04](https://www.digitalocean.com/community/tutorials/how-to-set-up-an-openvpn-server-on-ubuntu-18-04)

