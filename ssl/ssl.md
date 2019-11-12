# SSL

## Generate Self-signed Certificate

```console
$ openssl req -newkey rsa:2048 -x509 -nodes -days 365 -keyout my-ssl.key -out my-ssl.crt
Generating a 2048 bit RSA private key
..+++
............................+++
writing new private key to 'my-ssl.key'
...
Country Name (2 letter code) [XX]:TH
State or Province Name (full name) []:Bangkok
Locality Name (eg, city) [Default City]:Phayathai
Organization Name (eg, company) [Default Company Ltd]:My Company Ltd
Organizational Unit Name (eg, section) []:
Common Name (eg, your name or your server's hostname) []:
Email Address []:
```

```console
$ ls -l
-rw-rw-r--. 1 supasin supasin 1245 Nov 11 22:43 my-ssl.crt
-rw-rw-r--. 1 supasin supasin 1704 Nov 11 22:43 my-ssl.key
```

## Check Private Key

```console
$ cat my-ssl.key
-----BEGIN PRIVATE KEY-----
MIIEvgIB...
-----END PRIVATE KEY-----
```

```console
$ openssl rsa -in my-ssl.key -check
RSA key ok
writing RSA key
...
```

## Check Certificate File

```console
$ cat my-ssl.crt
-----BEGIN CERTIFICATE-----
MIIDazCC...
-----END CERTIFICATE-----
```

```console
$ openssl x509 -in my-ssl.crt -text -noout
Certificate:
    Data:
        Version: 3 (0x2)
        Serial Number:
            cf:9e:57:...
    Signature Algorithm: sha256WithRSAEncryption
        Issuer: C=TH, ST=Bangkok, L=Phayathai, O=My Company Ltd
        Validity
            Not Before: Nov 11 15:43:42 2019 GMT
            Not After : Nov 10 15:43:42 2020 GMT
        Subject: C=TH, ST=Bangkok, L=Phayathai, O=My Company Ltd
        Subject Public Key Info:
            Public Key Algorithm: rsaEncryption
                Public-Key: (2048 bit)
                Modulus:
                    00:9b:f3:...
                Exponent: 65537 (0x10001)
        X509v3 extensions:
            X509v3 Subject Key Identifier:
                FA:31:36:...
            X509v3 Authority Key Identifier:
                keyid:FA:...

            X509v3 Basic Constraints:
                CA:TRUE
    Signature Algorithm: sha256WithRSAEncryption
         3e:d6:3e:...
```
