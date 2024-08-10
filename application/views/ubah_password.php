<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
    </style>
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
    <div class="container">
        <div class="form-container">
            <h1>Change Password</h1>
            <?php if ($this->session->flashdata('msg')): ?>
                <div class="w3-panel w3-pale-green w3-border">
                    <?= $this->session->flashdata('msg') ?>
                </div>
            <?php endif; ?>
            <form action="<?= site_url('Password/update_password') ?>" method="post">
                <div class="w3-margin-bottom">
                    <label for="current_password">Current Password:</label>
                    <input type="password" id="current_password" name="current_password" class="w3-input w3-border" required>
                </div>
                <div class="w3-margin-bottom">
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" class="w3-input w3-border" required>
                </div>
                <div class="w3-margin-bottom">
                    <label for="confirm_password">Confirm New Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="w3-input w3-border" required>
                </div>
                <button type="submit" class="w3-button w3-blue">Update Password</button>
            </form>
        </div>
    </div>
</body>
</html>
