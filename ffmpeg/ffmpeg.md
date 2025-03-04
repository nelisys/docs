# ffmpeg

```
time ffmpeg -analyzeduration 100000 \
    -i "rtsp://192.168.1.1:554/live" \
    -an \
    -frames:v 10 \
    -vf fps=1/1 \
    snapshot_%04d.png
```
