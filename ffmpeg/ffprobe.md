# ffprobe

## get video duration

```
$ ffprobe -v error -show_entries format=duration -of csv=p=0 video-file.mp4
1498.602667
```

the output show in seconds
