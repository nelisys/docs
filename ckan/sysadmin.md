# Sysadmin

## Creating a sysadmin user

```
. /usr/lib/ckan/default/bin/activate
cd /usr/lib/ckan/default/src/ckan
```

Create `admin`

```
ckan -c /etc/ckan/default/ckan.ini sysadmin add admin email=admin@example.com name=admin
```

