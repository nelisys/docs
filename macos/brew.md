# brew

## list services

```console
$ brew services list
Name      Status  User    Plist
php@7.2   started root    /Library/LaunchDaemons/homebrew.mxcl.php@7.2.plist
```

## restart service

```console
$ sudo brew services restart php@7.2
```

## php.ini

```console
$ vi /usr/local/etc/php/7.2/php.ini
...
max_execution_time = 300
```

## link

```
brew link php@8.1
```

## Install older php@7.4

```
$ brew edit php@7.4
disable! date: "2022-11-28", because: :versioned_formula
```

```
$ brew install /usr/local/Homebrew/Library/Taps/homebrew/homebrew-core/Formula/php\@7.4.rb
```
