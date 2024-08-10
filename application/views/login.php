<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
</head>
<body>
    <br>
    <div class="w3-container">
        <div class="w3-row">
            <div class="w3-col" style="width:30%"><p></p></div>
            <div class="w3-col" style="width:40%">
                <div class="w3-card-4">
                    <div class="w3-container w3-blue">
                        <h2>Login</h2>
                    </div>
                    <form class="w3-container" method="POST" action="<?php echo site_url('Login/autentikasi');?>">
                        <p>      
                            <label class="w3-text-blue"><b>Username</b></label>
                            <input class="w3-input w3-border w3-sand" name="username" type="username">
                        </p>
                        <p>      
                            <label class="w3-text-blue"><b>Password</b></label>
                            <input class="w3-input w3-border w3-sand" name="password" type="password">
                        </p>
                        <p>
                            <button class="w3-btn w3-blue">Masuk</button>
                        </p>
                    </form>
                </div>
                <p> Belum punya akun ?
                    <a href="<?= base_url('Daftar/index'); ?>"><button class="w3-btn">Daftar</button></a>
                 </p>
                <div class="w3-panel w3-blue w3-display-container">
                    <?php echo $this->session->flashdata('msg');?>
                </div>                  
            </div>
            <div class="w3-col" style="width:30%"><p></p></div>
        </div>
    </div>
</body>
</html>