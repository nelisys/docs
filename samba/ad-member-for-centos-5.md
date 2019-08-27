# AD Member for CentOS 5

```
# authconfig-tui

    ┌────────────────┤ Authentication Configuration ├─────────────────┐
    │                                                                 │
    │  User Information        Authentication                         │
    │  [ ] Cache Information   [*] Use MD5 Passwords                  │
    │  [ ] Use Hesiod          [*] Use Shadow Passwords               │
    │  [ ] Use LDAP            [ ] Use LDAP Authentication            │
    │  [ ] Use NIS             [ ] Use Kerberos                       │
    │  [ ] Use Winbind         [*] Use SMB Authentication             │
    │                          [ ] Use Winbind Authentication         │
    │                          [ ] Local authorization is sufficient  │
    │                                                                 │
    │            ┌────────┐                      ┌──────┐             │
    │            │ Cancel │                      │ Next │             │
    │            └────────┘                      └──────┘             │
    │                                                                 │
    │                                                                 │
    └─────────────────────────────────────────────────────────────────┘


    ┌──────────────────┤ SMB Settings ├───────────────────┐
    │                                                     │
    │ Workgroup: EXAMPLE_________________________________ │
    │   Servers: samba4.example.com______________________ │
    │     Shell: /bin/false______________________________ │
    │                                                     │
    │          ┌──────┐                  ┌────┐           │
    │          │ Back │                  │ Ok │           │
    │          └──────┘                  └────┘           │
    │                                                     │
    │                                                     │
    └─────────────────────────────────────────────────────┘
```

```
# service winbind restart
```

```
# vi /etc/samba/smb.conf
[global]
    server string = Samba Server Version %v
    security = ADS
    workgroup = EXAMPLE
    realm = EXAMPLE.COM
    password server = samba4.example.com

    dedicated keytab file = /etc/krb5.keytab
    kerberos method = secrets and keytab
    log file = /var/log/samba/log.%m
    max log size = 50
    log level = 3

    idmap config *:backend = tdb
    idmap config *:range = 2000-9999
    idmap config EXAMPLE.COM:backend = ad
    idmap config EXAMPLE.COM:schema_mode = rfc2307
    idmap config EXAMPLE.COM:range = 10000-99999
    idmap config EXAMPLE.COM:uid = 500-10000000
    idmap config EXAMPLE.COM:gid = 500-10000000
    winbind nss info = rfc2307
    winbind trusted domains only = no
    winbind use default domain = yes
    winbind enum users = yes
    winbind enum groups = yes
    winbind refresh tickets = Yes

    domain master = no
    domain logons = no
    local master = no
    os level = 64
    preferred master = no
```

```
# service smb restart
```

