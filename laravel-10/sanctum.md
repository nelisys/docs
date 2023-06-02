# sanctum

## curl stateful

### csrf-cookie

```
curl -c cookies.txt \
    http://api.example.test/sanctum/csrf-cookie
```

### login

```
XSRF_TOKEN=`cat cookies.txt | grep XSRF-TOKEN | sed 's/.*XSRF-TOKEN\t//;s/\%3D/=/'`

curl -b cookies.txt -c cookies.txt \
    -H "X-Requested-With: XMLHttpRequest" \
    -H "X-XSRF-TOKEN: $XSRF_TOKEN" \
    -X POST \
    -d 'email=alice@example.test&password=secret' \
    http://api.example.test/api/login
```

### /api/user

```
XSRF_TOKEN=`cat cookies.txt | grep XSRF-TOKEN | sed 's/.*XSRF-TOKEN\t//;s/\%3D/=/'`

curl -b cookies.txt \
    -H "X-Requested-With: XMLHttpRequest" \
    -H "X-XSRF-TOKEN: $XSRF_TOKEN" \
    -H 'Origin: http://web.example.test' \
    http://api.example.test/api/user
```

### logout


curl -b cookies.txt \
    -H "X-Requested-With: XMLHttpRequest" \
    -H "X-XSRF-TOKEN: $XSRF_TOKEN" \
    -X POST \
    http://api.example.test/api/logout
```
