# geolocation

```js
async function getLocation() {
  return new Promise((resolve, reject) => {
    navigator
      .geolocation
      .getCurrentPosition(resolve, reject);
  });
}

// data.coords.latitude
// data.coords.longitude
```
