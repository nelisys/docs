# build cockpit

## redhat 8

```
$ git clone https://github.com/cockpit-project/cockpit
$ cd cockpit/

# ssh from mac
$ export LC_CTYPE=en_US.utf-8
$ export LC_ALL=en_US.utf-8

$ sudo yum install -y autoconf \
    automake \
    glib2-devel \
    systemd-devel \
    json-glib-devel \
    polkit-devel \
    gnutls-devel \
    krb5-devel \
    libssh-devel \
    pam-devel \
    pcp-devel \
    intltool \
    libxslt \
    xmlto \
    python2 \

$ ./autogen.sh


$ npm install clean-css-cli less uglify-js

$ make

$ sudo mount -o bind dist /usr/share/cockpit
```
