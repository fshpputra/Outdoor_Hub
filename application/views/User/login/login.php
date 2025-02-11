<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outdoor Hub - Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/')?>user/css/style.css">
</head>
<body>
<div class="login-wrapper">
    <div class="login-container">
        <div class="login-left">
            <img src="<?= base_url('assets/')?>user/image/logo_trans.png" alt="Logo" class="logo">
        </div>
        <div class="login-right">
            <h2>Welcome</h2>
            <p>Silahkan Masukkan kedalam akun anda</p>
            <form action="index.html" method="POST" class="login-form">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn-login">Login</button>
            </form>
            <div class="login-links">
                <a href="">Forgot Password?</a>
                <span>|</span>
                <a href="<?= base_url('Signup') ?>">Create an Account</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
