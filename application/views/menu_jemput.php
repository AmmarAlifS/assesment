<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Jemput</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&libraries=places&callback=initMap" async defer></script>
    <script>
        let map;
        let directionsService;
        let directionsRenderer;
        let autocompleteFrom;
        let autocompleteTo;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: -6.903421, lng: 107.478345 },
                zoom: 13
            });
            directionsService = new google.maps.DirectionsService();
            directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(map);

            // Initialize autocomplete for 'Dari' and 'Destination'
            autocompleteFrom = new google.maps.places.Autocomplete(document.getElementById('dari'));
            autocompleteTo = new google.maps.places.Autocomplete(document.getElementById('destination'));

            autocompleteFrom.addListener('place_changed', calculateRoute);
            autocompleteTo.addListener('place_changed', calculateRoute);

            // Remove default values for 'dari' and 'destination'
            document.getElementById('dari').value = '';
            document.getElementById('destination').value = '';
        }

        function calculateRoute() {
            const from = document.getElementById('dari').value;
            const to = document.getElementById('destination').value;

            if (!from || !to) {
                return; // Do nothing if either field is empty
            }

            const request = {
                origin: from,
                destination: to,
                travelMode: 'DRIVING'
            };

            directionsService.route(request, (result, status) => {
                if (status === 'OK') {
                    directionsRenderer.setDirections(result);

                    // Update latitude dan longitude
                    const route = result.routes[0].legs[0];
                    document.getElementById('start_lat').value = route.start_location.lat();
                    document.getElementById('start_lng').value = route.start_location.lng();
                    document.getElementById('end_lat').value = route.end_location.lat();
                    document.getElementById('end_lng').value = route.end_location.lng();
                } else {
                    alert('Could not find route: ' + status);
                }
            });
        }

        // Event listener untuk menangani perubahan input
        function setupEventListeners() {
            document.getElementById('dari').addEventListener('change', calculateRoute);
            document.getElementById('destination').addEventListener('change', calculateRoute);
        }

        window.onload = function() {
            initMap();
            setupEventListeners();
        }
    </script>
</head>
<body>
    <div class="w3-bar w3-border w3-light-grey w3-card-4">
        <?php if($this->session->userdata('access')=='Orang Tua'){ ?>
            <a href="<?= base_url('Home'); ?>" class="w3-bar-item w3-blue w3-button">Home</a>
            <a href="<?= base_url('Profile/index'); ?>" class="w3-bar-item w3-button">Profile</a>
            <a href="<?= base_url('Password/index'); ?>" class="w3-bar-item w3-button">Ganti Password</a>
        <?php } if($this->session->userdata('access')=='Driver'){ ?>
            <a href="<?= base_url('HomeDriver'); ?>" class="w3-bar-item w3-blue w3-button">Home</a>
            <a href="<?= base_url('Profile/index'); ?>" class="w3-bar-item w3-button">Profile</a>
            <a href="<?= base_url('Password/index'); ?>" class="w3-bar-item w3-button">Ganti Password</a>
        <?php }; ?>
        <a href="<?php echo site_url('login/logout');?>" class="w3-bar-item w3-button w3-red w3-right">Keluar</a>
    </div>
    <div class="w3-container w3-padding-32" style="max-width: 600px; margin: auto;">
        <h2 class="w3-center">Pesan Jemput</h2>
        <?php if($this->session->flashdata('msg')): ?>
            <div class="w3-panel w3-green">
                <p><?php echo $this->session->flashdata('msg'); ?></p>
            </div>
        <?php endif; ?>

        <form class="w3-container w3-card-4 w3-light-grey" action="<?php echo site_url('Jemput/pesan'); ?>" method="POST">
            <p>
                <label>Dari</label>
                <input id="dari" class="w3-input w3-border" type="text" name="dari" required>
            </p>
            <p>
                <label>Destination</label>
                <input id="destination" class="w3-input w3-border" type="text" name="destination" required>
            </p>

            <!-- Tampilkan data profil -->
            <?php if (!empty($profile)): ?>
                <div class="w3-panel w3-light-grey">
                    <h4>Profile Information</h4>
                    <p><strong>Username:</strong> <?php echo $profile['username']; ?></p>
                    <p><strong>Alamat:</strong> <?php echo $profile['alamat']; ?></p>
                    <p><strong>No HP:</strong> <?php echo $profile['nohp']; ?></p>
                </div>
            <?php else: ?>
                <div class="w3-panel w3-red">
                    <p>Profile information not found.</p>
                </div>
            <?php endif; ?>

            <!-- Hidden inputs for latitude and longitude -->
            <input type="hidden" id="start_lat" name="start_lat">
            <input type="hidden" id="start_lng" name="start_lng">
            <input type="hidden" id="end_lat" name="end_lat">
            <input type="hidden" id="end_lng" name="end_lng">

            <p>
                <button class="w3-button w3-blue w3-block" type="submit">Pesan</button>
            </p>
        </form>

        <!-- Map container -->
        <h2 class="w3-center">Lokasi</h2>
        <div id="map" style="height: 400px; width: 100%;"></div>
    </div>
</body>
</html>
