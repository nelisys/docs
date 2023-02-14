# Error

##

`/etc/ckan/default/ckan.ini`

```
ckan.plugins = stats text_view image_view recline_view datastore
```

```
sudo -u postgres createuser -S -D -R -P -l datastore_default

sudo -u postgres createdb -O ckan_default datastore_default -E utf-8
```

`/etc/ckan/default/ckan.ini`

```
ckan.datastore.write_url = postgresql://ckan_default:secret@localhost/datastore_default
ckan.datastore.read_url = postgresql://datastore_default:secret@localhost/datastore_default
```

```
. /usr/lib/ckan/default/bin/activate
cd /usr/lib/ckan/default/src/ckan

ckan -c /etc/ckan/default/ckan.ini datastore set-permissions | sudo -u postgres psql --set ON_ERROR_STOP=1
```

