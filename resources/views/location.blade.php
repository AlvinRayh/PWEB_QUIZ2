<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Map Location</title>
    <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
      crossorigin=""
    />

    <script
      src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
      integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
      crossorigin=""
    ></script>

    <style>
      #map {
        height: 1366px;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
  </body>
  <script>
    let zoomed = false;
    var map = L.map("map");
    var defaultLatLng = [8, -7.309];

    map.setView(defaultLatLng, 12);

    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
      maxZoom: 19,
      attribution:
        '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    }).addTo(map);

    if (navigator.geolocation) {
      navigator.geolocation.watchPosition(success, error, {
        enableHighAccuracy: true,
      });
    } else {
      alert("Geolocation is not supported by your browser.");
    }

    function success(pos) {
      const lat = pos.coords.latitude;
      const lng = pos.coords.longitude;
      const accuracy = pos.coords.accuracy;

      let marker = L.marker([lat, lng]).addTo(map);
      let circle = L.circle([lat, lng], { radius: accuracy }).addTo(map);

      if (!zoomed) {
        map.fitBounds(circle.getBounds());
        zoomed = true;
      }

      map.setView([lat, lng]);
    }

    function error(err) {
      if (err.code === 1) {
        alert("Please allow geolocation access in your browser settings.");
      } else if (err.code === 2) {
        alert("Location information is unavailable.");
      } else if (err.code === 3) {
        alert("The request to get user location timed out.");
      } else {
        alert("An unknown error occurred.");
      }
    }
  </script>
</html>
