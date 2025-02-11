<html>
<head>
    <title>Login</title>
</head>
<body>
    <?php if ($this->session->flashdata('error')): ?>
        <p><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <form method="post" action="<?php base_url('welcome/login'); ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>