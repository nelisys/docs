# Thai

## Add Thai Fonts

```
$ cd /usr/share/fonts

$ sudo mkdir THSarabunNew
```

Download THSarabunNew fonts, and extract the files

```
$ cd THSarabunNew/

$ unzip ~/Downloads/THSarabunNew.zip

$ ls -1
THSarabunNew BoldItalic.ttf
THSarabunNew Bold.ttf
THSarabunNew Italic.ttf
THSarabunNew.ttf
```

Build font information cache files.

```
$ sudo fc-cache -f /usr/share/fonts
```
