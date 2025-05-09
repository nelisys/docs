# Post Installation

## Change User Password

```console
$ passwd
Changing password for pi.
Current password:
New password:
Retype new password:
passwd: password updated successfully
```

## Update the software

```console
pi@raspberrypi:~ $ sudo apt update

pi@raspberrypi:~ $ sudo apt -y upgrade
```

## Set timezone

```console
pi@raspberrypi:~ $ sudo timedatectl set-timezone Asia/Bangkok
```

```
sudo apt install vim
```

## raspi-config

```
sudo raspi-config nonint do_configure_keyboard us
```

## bashrc

```
# /etc/bash.bashrc
alias vi='vim'
alias cp='cp -i'
alias mv='mv -i'
alias rm='rm -i'

unset HISTFILE
```

## vimrc

```
" /etc/vim/vimrc
set autoindent
set tabstop=4
set expandtab
set nohlsearch
```
