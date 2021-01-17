# git bash prompt

`~/.bash_profile`

```
parse_git_branch() {
    branch=`git branch 2> /dev/null | grep '^*' | sed 's/* //'`

    if [ "$branch" == "" ] || [ "$branch" == "master" ] || [ "$branch" == "main" ]; then
        echo ''
    else
        echo "($branch)"
    fi
}

export PS1="[\u@\h \W\[\e[90m\]\$(parse_git_branch)\[\e[00m\]]\$ "
```
