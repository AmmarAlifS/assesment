<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profil</title>
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
        <h1>Update Profil</h1>
        <?php if ($this->session->flashdata('msg')): ?>
            <div class="w3-panel w3-pale-green w3-border">
                <?php echo $this->session->flashdata('msg'); ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo site_url('profile/update'); ?>" method="post">
            <input type="hidden" name="current_password" value="<?php echo $user['password']; ?>"> <!-- Menyimpan password saat ini -->

            <div class="w3-row-padding">
                <div class="w3-half">
                    <label for="username">Nama Pengguna:</label>
                    <input type="text" id="username" name="username" class="w3-input w3-border" value="<?php echo set_value('username', $user['username']); ?>" required>
                </div>
            </div>
            <!-- <div class="w3-row-padding">
                <div class="w3-half">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="w3-input w3-border" placeholder="Kosongkan jika tidak ingin mengubah password">
                </div>
            </div> -->
            <div class="w3-row-padding">
                <div class="w3-half">
                    <label for="alamat">Alamat:</label>
                    <textarea id="alamat" name="alamat" class="w3-input w3-border" rows="4"><?php echo set_value('alamat', $user['alamat']); ?></textarea>
                </div>
            </div>
            <div class="w3-row-padding">
                <div class="w3-half">
                    <label for="nohp">Nomor Telepon:</label>
                    <input type="text" id="nohp" name="nohp" class="w3-input w3-border" value="<?php echo set_value('nohp', $user['nohp']); ?>" required>
                </div>
            </div>
            <!-- <div class="w3-row-padding">
                <div class="w3-half">
                    <label for="status">Status:</label>
                    <input type="text" id="status" name="status" class="w3-input w3-border" value="<?php echo set_value('status', $user['status']); ?>" required>
                </div>
                <div class="w3-half">
                    <label for="akses">Akses:</label>
                    <input type="text" id="akses" name="akses" class="w3-input w3-border" value="<?php echo set_value('akses', $user['akses']); ?>" required>
                </div>
            </div> -->
            <br>
            <button type="submit" class="w3-button w3-blue">Simpan</button>
        </form>
    </div>
</body>
</html>
