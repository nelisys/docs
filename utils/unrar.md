# unrar

Install unrar on Ubuntu 18.04

```console
$ file test.rar
test.rar: RAR archive data, v5

$ sudo apt install unrar

$ unrar e test.rar

UNRAR 5.50 freeware      Copyright (c) 1993-2017 Alexander Roshal

Extracting from test.rar

Extracting  file.txt            OK
Extracting  hello.php           OK
All OK

$ ls -1
file.txt
hello.php
test.rar
```
