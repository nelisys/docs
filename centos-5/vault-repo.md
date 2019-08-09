# CentOS 5 Vault Repo

```console
[root@cent5 ~]# yum repolist
Loaded plugins: fastestmirror, security
Loading mirror speeds from cached hostfile
...
repo id                        repo name                                  status
base                           CentOS-5 - Base                            0
extras                         CentOS-5 - Extras                          0
updates                        CentOS-5 - Updates                         0
repolist: 0

[root@cent5 ~]# cd /etc/yum.repos.d/
[root@cent5 yum.repos.d]# ls -l
total 56
-rw-r--r-- 1 root root 1960 Aug  9 06:48 CentOS-Base.repo
-rw-r--r-- 1 root root  645 Sep 20  2014 CentOS-Debuginfo.repo
-rw-r--r-- 1 root root  626 Sep 20  2014 CentOS-Media.repo
-rw-r--r-- 1 root root 1330 Sep 20  2014 CentOS-Sources.repo
-rw-r--r-- 1 root root 8315 Aug  9 06:48 CentOS-Vault.repo
-rw-r--r-- 1 root root  277 Sep 20  2014 CentOS-fasttrack.repo
```

add ```enabled=0``` at the end each section ```[base]```, ```[updates]```, ```[extras]```

```
[root@cent5 yum.repos.d]# vi CentOS-Base.repo
[base]
name=CentOS-$releasever - Base
#mirrorlist=http://mirrorlist.centos.org/?release=$releasever&arch=$basearch&rep
o=os
baseurl=http://mirror.centos.org/centos/$releasever/os/$basearch/
gpgcheck=1
gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-CentOS-5
gpgcheck=1
enabled=0

#released updates
[updates]
name=CentOS-$releasever - Updates
#mirrorlist=http://mirrorlist.centos.org/?release=$releasever&arch=$basearch&rep
o=updates
#baseurl=http://mirror.centos.org/centos/$releasever/updates/$basearch/
gpgcheck=1
gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-CentOS-5
gpgcheck=1
enabled=0

#additional packages that may be useful
[extras]
name=CentOS-$releasever - Extras
mirrorlist=http://mirrorlist.centos.org/?release=$releasever&arch=$basearch&repo
=extras
#baseurl=http://mirror.centos.org/centos/$releasever/extras/$basearch/
gpgcheck=1
gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-CentOS-5
gpgcheck=1
enabled=0

...
```


```console

[root@cent5 yum.repos.d]# yum repolist
Loaded plugins: fastestmirror, security
Loading mirror speeds from cached hostfile
repolist: 0
```

change ```enable=1``` in Vault repo, also change ```5.10``` to ```5.11```

```
[root@cent5 yum.repos.d]# vi CentOS-Vault.repo
[C5.11-base]
name=CentOS-5.11 - Base
baseurl=http://vault.centos.org/5.11/os/$basearch/
gpgcheck=1
gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-CentOS-5
enabled=1

[C5.11-updates]
name=CentOS-5.11 - Updates
baseurl=http://vault.centos.org/5.11/updates/$basearch/
gpgcheck=1
gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-CentOS-5
enabled=1

[C5.11-extras]
name=CentOS-5.11 - Extras
baseurl=http://vault.centos.org/5.11/extras/$basearch/
gpgcheck=1
gpgkey=file:///etc/pki/rpm-gpg/RPM-GPG-KEY-CentOS-5
enabled=1
```

```console
[root@cent5 yum.repos.d]# yum repolist
Loaded plugins: fastestmirror, security
Loading mirror speeds from cached hostfile
repo id                          repo name                                status
C5.11-base                       CentOS-5.11 - Base                       3667
C5.11-extras                     CentOS-5.11 - Extras                      266
C5.11-updates                    CentOS-5.11 - Updates                     974
repolist: 4907
```

now you can use ```yum install```, ```yum update```


