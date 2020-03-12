# moment

## parse

```javascript
moment("2019-09-24", "YYYY-MM-DD");
```

## format

format()

```jacascript
moment().format('YYYY-MM-DD HH:mm:ss');
```

## formats

| format     | example    |
| ---------- | ---------- |
| YYYY-MM-DD | 2019-08-07 |
| HH:mm:ss   | 23:47      |
| D MMM YYYY | 7 Aug 2019 |
| ddd        | Sun        |

## convert

convert from unix timestamp

```javascript
moment.unix(timestamp);
```

## human

```javascript
moment().toNow(true);
```

## add, subtract

```javascript
moment().subtract(1, 'day');
moment().add(1, 'day');
```

