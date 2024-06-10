var map;
var userMarker;

function restuCreateMap() {
  // Set the initial map location

  if (navigator.geolocation) {
    // Get the current location of the user
    navigator.geolocation.getCurrentPosition(
      function (position) {
        // Success callback
        var userLocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };

        // Create a map centered at the user's location
        map = new google.maps.Map(document.getElementById('map'), {
          center: userLocation,
          zoom: 19
        });
        userMarker = new google.maps.Marker({
          position: userLocation,
          map: map,
          title: 'Set your location'
        });

        // Add a click event listener to the map
        map.addListener('click', function (event) {
          // Remove the previous marker if it exists
          if (userMarker) {
            userMarker.setMap(null);
          }

          // Get the clicked coordinates
          var clickedLatLng = event.latLng;

          // Reverse geocode to get address
          var geocoder = new google.maps.Geocoder();
          geocoder.geocode({ location: clickedLatLng }, function (results, status) {
            if (status === 'OK') {
              if (results[0]) {
                // Display the address, latitude, and longitude
                var address = results[0].formatted_address;
                var latitude = clickedLatLng.lat();
                var longitude = clickedLatLng.lng();

                document.getElementById('restaurant_google_address').value = `${address}`;
                document.getElementById('restaurant_google_longitude').value = `${longitude}`;
                document.getElementById('restaurant_google_latitude').value = `${latitude}`;



                // Add a new marker at the clicked location
                userMarker = new google.maps.Marker({
                  position: clickedLatLng,
                  map: map,
                  title: 'Set your location'
                });

                fetch('/save-location', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                  },
                  body: JSON.stringify({
                      address: address,
                      latitude: latitude,
                      longitude: longitude
                  })
              }).then(response => response.json()).catch(error => console.error('Error:', error));
              } else {
                alert('No results found');
              }
            } else {
              alert('Geocoder failed due to: ' + status);
            }
          });
        });

      },
      function (error) {
        // Error callback
        console.error('Error getting user location:', error);

        // If there's an error, set a default location
        var initialLocation = { lat: 23.7749, lng: 90.4194 };
        map = new google.maps.Map(document.getElementById('map'), {
          center: initialLocation,
          zoom: 15
        });
        userMarker = new google.maps.Marker({
          position: initialLocation,
          map: map,
          title: 'Set your location'
        });
      }
    );
  } else {
    console.error('Geolocation is not supported by this browser.');
  }
}

// Call the initMap function when the page is loaded
// window.onload = initMap;