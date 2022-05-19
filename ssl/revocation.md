# revocation

## Revoked site

```
site=revoked.grc.com
```

## Get Site Certificate in PEM format

```
openssl s_client -connect $site:443 2>&1 < /dev/null | \
    sed -n '/-----BEGIN/,/-----END/p' > $site.pem
```

## Parse pem file

```
openssl x509 -noout -text -in $site.pem
```

output

```
Certificate:
    Data:
        Version: 3 (0x2)
        Serial Number:
            0b:2c:a2:d9:65:23:d6:2a:00:77:d0:fc:c5:b4:63:00
    Signature Algorithm: sha256WithRSAEncryption
        Issuer: C=US, O=DigiCert Inc, CN=DigiCert SHA2 Secure Server CA
        Validity
            Not Before: Aug 20 00:00:00 2020 GMT
            Not After : Aug 25 12:00:00 2022 GMT

        X509v3 extensions:
           ...
           X509v3 CRL Distribution Points:

               Full Name:
                 URI:http://crl3.digicert.com/ssca-sha2-g6.crl

               Full Name:
                 URI:http://crl4.digicert.com/ssca-sha2-g6.crl
```

## Download CRL file

```
curl -o crl.der http://crl3.digicert.com/ssca-sha2-g6.crl
```

## Parse DER file

```
openssl crl -inform DER -text -noout -in crl.der
```

output

```
Certificate Revocation List (CRL):
        Version 2 (0x1)
    Signature Algorithm: sha256WithRSAEncryption
        Issuer: /C=US/O=DigiCert Inc/CN=DigiCert SHA2 Secure Server CA
        Last Update: May 18 08:20:29 2022 GMT
        Next Update: May 25 08:20:29 2022 GMT

        CRL extensions:
            X509v3 Authority Key Identifier:
                keyid:0F:80:61:1C:82:31:61:D5:2F:28:E7:8D:46:38:B4:2C:E1:C6:D9:E2

            X509v3 CRL Number:
                1636
            X509v3 Issuing Distribution Point: critical
                Full Name:
                  URI:http://crl3.digicert.com/ssca-sha2-g6.crl

Revoked Certificates:
    ...
    Serial Number: 0B2CA2D96523D62A0077D0FCC5B46300
        Revocation Date: Aug 20 21:24:42 2020 GMT
```

Serial Number in Revoked Certificate *0B2CA2D96523D62A0077D0FCC5B46300* matches the Site's Serial Number *0b:2c:a2:d9:65:23:d6:2a:00:77:d0:fc:c5:b4:63:00*

# Ref.

- https://raymii.org/s/articles/OpenSSL_manually_verify_a_certificate_against_a_CRL.html

