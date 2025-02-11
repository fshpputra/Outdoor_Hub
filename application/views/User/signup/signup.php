<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?= base_url('assets/')?>user/css/style.css">
</head>
<body>
<div class="register-wrapper">
    <div class="register-container">
        <div class="register-left">
            <img src="<?= base_url('assets/')?>user/image/logo_trans.png" alt="Logo" class="logo">
        </div>
        <div class="register-right">
            <h2>Create Your Account</h2>
            <form action="" method="POST" class="register-form">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" placeholder="Enter your address" required></textarea>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Create a password" required>
                </div>
                <button type="submit" class="btn-register">Register</button>
            </form>
            <div class="register-links">
                <p>Already have an account? <a href="<?= base_url('AuthUser') ?>">Login here</a></p>
            </div>
        </div>
    </div>
</div>



</body>
</html>


