# git

```console
$ git init
Initialized empty Git repository in /home/supasin/projects/hello/.git/

$ ls -a
.        ..        .git

$ touch readme.md

$ git add readme.md

$ git commit -m 'init'
[master (root-commit) f1afdb6] init
 1 file changed, 0 insertions(+), 0 deletions(-)
 create mode 100644 readme.md

$ git status
On branch master
nothing to commit, working tree clean

$ git log
commit f1af... (HEAD -> master)
Author: Supasin S <supasin@example.com>
Date:   Wed Aug 7 20:48:49 2019 +0700

    init
```
