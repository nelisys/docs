# screen

## detach from the Screen Session:

Press `Ctrl + A` followed by `d` 

## List Running Screens:

```
screen -ls
```

## Reattach to the Screen Session:

```
screen -r <screen_session_id>
```

## Kill the Screen Session

```
screen -X -S <screen_session_id> quit
```
