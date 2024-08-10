<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Jemput</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

    <div class="container">
        <?php if($this->session->flashdata('msg')): ?>
            <div class="w3-panel w3-green">
                <p><?php echo $this->session->flashdata('msg'); ?></p>
            </div>
        <?php endif; ?>

        <!-- Data Antar -->
        <h2 class="w3-center">Data Jemput</h2>
        <table class="w3-table w3-striped w3-bordered">
            <thead>
                <tr>
                    <th>ID Jemput</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Dari</th>
                    <th>Destination</th>
                    <th>Start_Lat</th>
                    <th>End_Lat</th>
                    <th>Start_Lng</th>
                    <th>End_Lng</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($jemput_data)): ?>
                    <?php foreach ($jemput_data as $index => $jemput): ?>
                        <tr>
                            <td><?php echo $jemput['id_jemput']; ?></td>
                            <td><?php echo $jemput['username']; ?></td>
                            <td><?php echo $jemput['alamat']; ?></td>
                            <td><?php echo $jemput['nohp']; ?></td>
                            <td><?php echo $jemput['dari']; ?></td>
                            <td><?php echo $jemput['destination']; ?></td>
                            <td><?php echo $jemput['start_lat']; ?></td>
                            <td><?php echo $jemput['end_lat']; ?></td>
                            <td><?php echo $jemput['start_lng']; ?></td>
                            <td><?php echo $jemput['end_lng']; ?></td>
                            <td><button onclick="showRoute(<?php echo $jemput['start_lat']; ?>, <?php echo $jemput['start_lng']; ?>, <?php echo $jemput['end_lat']; ?>, <?php echo $jemput['end_lng']; ?>)">
                                Tampilkan Route
                            </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="11">No data available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Map container -->
        <h2 class="w3-center">Lokasi</h2>
        <div id="map"></div>
    </div>
</body>
</html>

<style>
        /* CSS untuk mengatur posisi konten di tengah */
        .container {
            max-width: 1200px; /* Atur lebar maksimum konten */
            margin: auto; /* Pusatkan konten secara horizontal */
            padding: 20px; /* Tambahkan padding */
        }
        #map {
            height: 500px;
            width: 100%;
        }
        table {
            width: 100%;
            border-collapse: collapse; /* Menghilangkan jarak antara border tabel */
        }
        th, td {
            text-align: center;
            padding: 10px;
        }
    </style>
    
<!-- random free api key -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&libraries=places&callback=initMap"></script>
<script>
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