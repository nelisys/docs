# Installation on Ubuntu 24.04

## Install Docker using apt repository

Set up Docker's apt repository.

```
sudo apt-get update
sudo apt-get install ca-certificates curl
sudo install -m 0755 -d /etc/apt/keyrings
sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg -o /etc/apt/keyrings/docker.asc
sudo chmod a+r /etc/apt/keyrings/docker.asc

echo \
  "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/ubuntu \
  $(. /etc/os-release && echo "$VERSION_CODENAME") stable" | \
  sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
sudo apt-get update
```

Install the Docker packages.

```
sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin
```

Test

```
sudo docker run hello-world
```

## pip

```
$ sudo apt install pipx
```

## Add User

```
sudo adduser openedx docker
```

## Install tutor

```
su - openedx
```

```
[openedx]$ pipx install 'tutor[full]'

[openedx]$ vi ~/.bash_profile
export PATH=~/.local/bin:$PATH

[openedx]$ tutor --version
tutor, version 19.0.0

[openedx]$ tutor local launch
```

## admin

```
tutor local do createuser --staff --superuser admin admin@edx.test
```

## Demo Course

```
tutor local do importdemocourse
```

