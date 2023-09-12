# auth

```
htpasswd -c .htpasswd alice
```

```
location /api {
    auth_basic "Auth";
    auth_basic_user_file /path/.htpasswd;
}
```
