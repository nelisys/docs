# ansible

## installation

```
sudo apt-add-repository ppa:ansible/ansible

sudo apt update

sudo apt install ansible
```

## inventory file

`/etc/ansible/hosts`

```
[servers]
u22-a1 ansible_host=192.168.56.31
u22-a2 ansible_host=192.168.56.32

[all:vars]
ansible_python_interpreter=/usr/bin/python3
```

```
ansible-inventory --list -y
```

```
ansible all -m ping
```

```
ansible all -a 'uptime'
```
