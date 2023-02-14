# CKAN : Installation

Ubuntu 20.04


## Prerequisite

```
sudo apt update

sudo apt install -y libpq5 redis-server nginx supervisor
```

## Install the CKAN package

```
wget https://packaging.ckan.org/python-ckan_2.9-py3-focal_amd64.deb

sudo dpkg -i python-ckan_2.9-py3-focal_amd64.deb
```

## Install and configure PostgreSQL

```
sudo apt install -y postgresql

sudo -u postgres psql -l

sudo -u postgres createuser -S -D -R -P ckan_default

sudo -u postgres createdb -O ckan_default ckan_default -E utf-8
```

## Install and configure Solr

```
sudo apt install -y solr-tomcat
```

`sudo vi /etc/tomcat9/server.xml`

Change From:

```
<Connector port="8080" protocol="HTTP/1.1"
```

To:

```
<Connector port="8983" protocol="HTTP/1.1"
```

```
sudo mv /etc/solr/conf/schema.xml /etc/solr/conf/schema.xml.bak
sudo ln -s /usr/lib/ckan/default/src/ckan/ckan/config/solr/schema.xml /etc/solr/conf/schema.xml

sudo service tomcat9 restart
```

## Update the configuration and initialize the database

`sudo vi /etc/ckan/default/ckan.ini`

```
ckan.site_id = default
ckan.site_url = http://demo.ckan.org
sqlalchemy.url = postgresql://ckan_default:secret@localhost/ckan_default

ckan.storage_path = /var/lib/ckan
```

```
sudo ckan db init
```

## Start the Web Server and restart Nginx

```
sudo supervisorctl reload

sudo supervisorctl status

sudo service nginx restart
```
