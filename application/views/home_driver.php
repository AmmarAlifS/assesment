<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Driver</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
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
    
    <div class="w3-container">
    <!-- Header untuk Nama dan Akses -->
        <div class="header-container">
            <h1>Hai <?php echo $this->session->userdata('name'); ?></h1>
            <h3>Ini adalah halaman untuk <?php echo $this->session->userdata('access'); ?></h3>
        </div>

        <!-- Kontainer untuk Menu Sejajar -->
        <div class="menu-container">
            <a href="<?php echo site_url('HomeDriver/antar'); ?>" class="w3-button w3-blue w3-card-4 menu-item">Menu Antar</a>
            <a href="<?php echo site_url('HomeDriver/jemput'); ?>" class="w3-button w3-green w3-card-4 menu-item">Menu Jemput</a>
        </div>
    </div>
</body>
</html>

<!-- CSS untuk Mengatur Posisi -->
<style>
    /* Posisi header di kiri atas */
    .header-container {
        margin-bottom: 100px;
        text-align: left;
    }

    /* Kontainer flexbox untuk menempatkan menu secara sejajar */
    .menu-container {
        display: flex;
        justify-content: space-between; /* Menempatkan menu dengan jarak yang sama di antara mereka */
        align-items: center;
    }

    /* Pengaturan item menu */
    .menu-item {
        padding: 20px;
        width: 70%; /* Lebar 30% agar menyisakan ruang di antara menu */
        text-align: center;
        font-size: 20px;
        margin: 0 10px; /* Jarak antar menu */
    }
</style>
