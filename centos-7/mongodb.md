# MongoDB

Create `/etc/yum.repos.d/mongodb-org-4.4.repo`

```
[mongodb-org-4.4]
name=MongoDB Repository
baseurl=https://repo.mongodb.org/yum/redhat/$releasever/mongodb-org/4.4/x86_64/
gpgcheck=1
enabled=1
gpgkey=https://www.mongodb.org/static/pgp/server-4.4.asc
```

```
$ sudo yum install -y mongodb-org
```

```
$ sudo systemctl restart mongod
```
