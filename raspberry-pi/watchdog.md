# watchdog

```
#!/bin/bash

while true; do
    chromium-browser --kiosk --noerrdialogs --disable-infobars --disable-session-crashed-bubble --disable-restore-session-state http://localhost
    sleep 2
done
```
