# time

## format duration time

```
function formatDuration(duration_seconds)
{
    let hours = Math.floor(duration_seconds / 3600);
    let minutes = Math.floor((duration_seconds % 3600) / 60);
    let seconds = Math.floor(duration_seconds % 60);

    let formatted = '';

    if (hours > 0) {
        formatted += `${hours}:`;
    }

    minutes = String(minutes).padStart(2, '0');
    seconds = String(seconds).padStart(2, '0');

    return `${formatted}${minutes}:${seconds}`;
}
```
