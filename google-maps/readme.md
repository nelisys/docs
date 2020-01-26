# Google Maps

- Get an API key and replace in `YOUR_API_KEY`

```html
<!DOCTYPE html>
<html>
<head>
<title>Simple Map</title>
<meta name="viewport" content="initial-scale=1.0">
<meta charset="utf-8">
<style>
#map {
    height: 100%;
}

html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}
</style>
</head>
<body>
<div id="map"></div>
<script>
    var map;

    var bangkokPosition = {
        lat: 13.7563,
        lng: 100.5018
    };

    var mapOptions = {
        center: bangkokPosition,
        zoom: 8,
        mapTypeId: 'roadmap',
    };

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), mapOptions);

        var marker = new google.maps.Marker({
            position: bangkokPosition,
            map: map,
            icon: {
                url: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
            }
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
</body>
</html>
```

## Settings

mapTypeId
* roadmap = Map (default)
- terrain = Map + [x] Terrain
- satellite = Satellite
- hybrid    = Satellite + [x] Labels

markers
- https://sites.google.com/site/gmapsdevelopment/

