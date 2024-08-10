<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Kendaraan</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: {lat: -6.903421, lng: 107.478344} // Default Kota Bandung
            });

            //  marker driver location
            var trackingData = <?php echo json_encode($tracking_data); ?>;
            trackingData.forEach(function(vehicle) {
                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(vehicle.latitude), lng: parseFloat(vehicle.longitude)},
                    map: map,
                    title: vehicle.username
                });
                
                var infoWindow = new google.maps.InfoWindow({
                    content: '<div><strong>Kendaraan ID:</strong> ' + vehicle.username + '<br>' +
                             '<strong>Latitude:</strong> ' + vehicle.latitude + '<br>' +
                             '<strong>Longitude:</strong> ' + vehicle.longitude + '</div>'
                });

                marker.addListener('click', function() {
                    infoWindow.open(map, marker);
                });
            });
        }
    </script>
</head>
<body onload="initMap()">
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
        <h2 class="w3-center">Tracking Kendaraan</h2>
        <div id="map"></div>
    </div>
</body>
</html>
