# Shell in a Box

## /etc/default/shellinabox

```
# Should shellinaboxd start automatically
SHELLINABOX_DAEMON_START=1

# TCP port that shellinboxd's webserver listens on
SHELLINABOX_PORT=6175

# Parameters that are managed by the system and usually should not need
# changing:
# SHELLINABOX_DATADIR=/var/lib/shellinabox
# SHELLINABOX_USER=shellinabox
# SHELLINABOX_GROUP=shellinabox

# Any optional arguments (e.g. extra service definitions).  Make sure
# that that argument is quoted.
#
#   Beeps are disabled because of reports of the VLC plugin crashing
#   Firefox on Linux/x86_64.
SHELLINABOX_ARGS="--no-beep"

# specify the IP address of an SSH server
OPTS="-s /:SSH:192.168.0.140"

# if you want to restrict access to shellinaboxd from localhost only
OPTS="-s /:SSH:192.168.0.140 --localhost-only"
```
