<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-container">
        <div class="w3-row">
            <div class="w3-col" style="width:30%"><p></p></div>
                <div class="w3-col" style="width:40%">
                    <div class="w3-card-4">
                        <div class="w3-container w3-blue">
                            <h2>Daftar Login</h2>
                        </div>
                        <!-- Tampilkan pesan flash -->
                        <?php if($this->session->flashdata('msg')): ?>
                            <div class="w3-panel w3-pale-red w3-border">
                                <?php echo $this->session->flashdata('msg'); ?>
                            </div>
                        <?php endif; ?>
                        <form class="w3-container"  action="<?php echo site_url('daftar/daftar_akun'); ?>" method="post">
                            <p>      
                                <label class="w3-text-blue"><b>Username</b></label>
                                <input class="w3-input w3-border w3-sand" name="username" type="text" required>
                            </p>
                            <p>      
                                <label class="w3-text-blue"><b>Password</b></label>
                                <input class="w3-input w3-border w3-sand" name="password" type="password" required>
                            </p>
                            <p>      
                                <label class="w3-text-blue"><b>Alamat</b></label>
                                <input class="w3-input w3-border w3-sand" name="alamat" type="text" required>
                            </p>
                            <p>      
                                <label class="w3-text-blue"><b>No HP</b></label>
                                <input class="w3-input w3-border w3-sand" name="nohp" type="number" required>
                            </p>
                            <label>Akses:</label><br>
                                <select name="akses" required>
                                    <option value="1">Orang Tua</option>
                                    <option value="2">Driver</option>
                                </select><br><br>
                            <p>
                                <button type="submit" class="w3-button w3-green">Daftar</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
         </div>
    </div>
</body>
</html>
