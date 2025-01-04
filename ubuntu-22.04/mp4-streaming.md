# MP4 Streaming

## Install NGINX with RTMP Module

```
sudo apt update && sudo apt upgrade -y

sudo apt install nginx libnginx-mod-rtmp
```

```
$ sudo vi /etc/nginx/nginx.conf
// ...
rtmp {
    server {
        listen 1935;
        chunk_size 4096;

        application live {
            live on;
            record off;
        }

        application videos {
            play /var/www/html/videos;
        }
    }
}
```

```
sudo mkdir -p /var/www/html/videos
sudo chmod -R 755 /var/www/html/videos
```

```
sudo systemctl restart nginx
```

Test by `VLC`

rtmp://your-server-ip/videos/<filename>.mp4

## Install FFmpeg for Encoding and Streaming

```
sudo apt install ffmpeg -y

ffmpeg -re -i input.mp4 -c:v libx264 -preset fast -b:v 3000k -c:a aac -b:a 128k -f flv rtmp://your-server-ip/live/stream
```

```
// nginx.conf
server {
    listen 80;
    server_name your-server-ip;

    location /videos/ {
        alias /var/www/html/videos/;
        add_header Cache-Control no-cache;
        types {
            video/mp4 mp4;
        }
    }
}
```

```
sudo systemctl restart nginx
```

```
<video width="640" height="360" controls>
    <source src="http://your-server-ip/videos/your_video.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
```
