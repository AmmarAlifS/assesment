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
    <a href="<?php echo site_url('Tracking/index'); ?>" class="w3-button w3-blue w3-card-4 menu-item">Menu Tracking</a>
        <h2 class="w3-center">Data Antar</h2>
    <?php if (!empty($tracking_data)): ?>
        <table class="w3-table w3-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Dari</th>
                    <th>Destination</th>
                    <th>Start Latitude</th>
                    <th>End Latitude</th>
                    <th>Start Longitude</th>
                    <th>End Longitude</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tracking_data as $data): ?>
                    <tr>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['dari']; ?></td>
                        <td><?php echo $data['destination']; ?></td>
                        <td><?php echo $data['start_lat']; ?></td>
                        <td><?php echo $data['end_lat']; ?></td>
                        <td><?php echo $data['start_lng']; ?></td>
                        <td><?php echo $data['end_lng']; ?></td>
                        <td>
                            <button onclick="showRoute(<?php echo $data['start_lat']; ?>, <?php echo $data['start_lng']; ?>, <?php echo $data['end_lat']; ?>, <?php echo $data['end_lng']; ?>)">
                                Tampilkan Route
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
    <div class="w3-panel w3-red">
        <p>Data tracking tidak ditemukan.</p>
    </div>
<?php endif; ?>
        <h2 class="w3-center">Tracking Kendaraan</h2>
        <div id="map"></div>
    </div>

</body>
</html>

<!-- random free api key -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&libraries=places&callback=initMap"></script>
    <script>
        var map;

        var map;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: {lat: -6.905977, lng: 107.613144} // Default Kota Bandung
    });
}

function showRoute(startLat, startLng, endLat, endLng) {
    var startLocation = {lat: parseFloat(startLat), lng: parseFloat(startLng)};
    var endLocation = {lat: parseFloat(endLat), lng: parseFloat(endLng)};

    var bounds = new google.maps.LatLngBounds();
    bounds.extend(startLocation);
    bounds.extend(endLocation);

    map.fitBounds(bounds);

    var markerStart = new google.maps.Marker({
        position: startLocation,
        map: map,
        title: 'Start Location'
    });

    var markerEnd = new google.maps.Marker({
        position: endLocation,
        map: map,
        title: 'End Location'
    });

    var routePath = new google.maps.Polyline({
        path: [startLocation, endLocation],
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
    });

    routePath.setMap(map);
}

</script>