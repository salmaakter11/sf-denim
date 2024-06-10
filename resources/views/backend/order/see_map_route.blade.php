<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Food Delivery Map Route') }}
        </h2>
    </x-slot>
    <div class="bg-gray-100 py-10">
        <div class="mx-auto w-full">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between">

                </div>
                <style>
                    #map {
                        height: 600px;
                    }

                    #floating-panel {

                        background-color: #fff;
                        padding: 5px;
                        border: 1px solid #999;
                        text-align: center;
                        font-family: "Roboto", "sans-serif";
                        line-height: 30px;
                        padding-left: 10px;
                    }
                </style>
                <div id="floating-panel" style="">
                    <b>Mode of Travel: </b>
                    <select id="mode">
                        <option value="DRIVING">Driving</option>
                        <option value="WALKING">Walking</option>
                        <option value="TRANSIT">Transit</option>
                    </select>
                </div>
                <div id="map"></div>

            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function initMap() {
            const markerArray = [];
            const directionsRenderer = new google.maps.DirectionsRenderer();
            const directionsService = new google.maps.DirectionsService();
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 19,
                center: {
                    lat: 37.77,
                    lng: -122.447
                },
            });

            directionsRenderer.setMap(map);
            const stepDisplay = new google.maps.InfoWindow();
            calculateAndDisplayRoute(directionsService, directionsRenderer,markerArray,stepDisplay,map);
            document.getElementById("mode").addEventListener("change", () => {
                calculateAndDisplayRoute(directionsService, directionsRenderer,markerArray,stepDisplay,map);
            });
        }

        function calculateAndDisplayRoute(directionsService, directionsRenderer,markerArray,stepDisplay,map) {
            for (let i = 0; i < markerArray.length; i++) {
                markerArray[i].setMap(null);
            }
            const selectedMode = document.getElementById("mode").value;

            directionsService
                .route({
                    origin: {
                        lat: {{ $order->restaurant->restaurant_google_latitude }},
                        lng: {{ $order->restaurant->restaurant_google_longitude }}
                    },
                    destination: {
                        lat: {{ $order->user_google_latitude }},
                        lng: {{ $order->user_google_longitude }}
                    },
                    travelMode: google.maps.TravelMode[selectedMode],
                })
                .then((response) => {
                    directionsRenderer.setDirections(response);
                    showSteps(response, markerArray, stepDisplay, map);
                })
                .catch((e) => window.alert("Directions request failed due to " + e));
        }
        function showSteps(directionResult, markerArray, stepDisplay, map) {

        const myRoute = directionResult.routes[0].legs[0];

          for (let i = 0; i < myRoute.steps.length; i++) {
            const marker = (markerArray[i] =
              markerArray[i] || new google.maps.Marker());
        
            marker.setMap(map);
            marker.setPosition(myRoute.steps[i].start_location);
            attachInstructionText(
              stepDisplay,
              marker,
              myRoute.steps[i].instructions,
              map,
            );
          }
        }

        function attachInstructionText(stepDisplay, marker, text, map) {
          google.maps.event.addListener(marker, "click", () => {
            // Open an info window when the marker is clicked on, containing the text
            // of the step.
            stepDisplay.setContent(text);
            stepDisplay.open(map, marker);
          });
        }

        window.initMap = initMap;
    </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj6QuYeaTvlxNbI7yfOjSZ5JDmpQCCZIc&callback=initMap&v=weekly">
        </script>
    @endpush
</x-app-layout>
