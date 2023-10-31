<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

</head>
<body>
    <div class="container">
        <?php flash('register_success'); ?>
        <h2>User login</h2>
        <form name="logInForm" action="<?php echo URLROOT; ?>/users/login" method="POST">
            <div class="form-group">
                <label for="email">Email: <sup>*</sup></label>
                <input type="email" name="email" required>
                <span class="invalid-feedback"><?php echo $data['email_err']?></span>
            </div>
            <div class="form-group">
                <label for="password">Password: <sup>*</sup></label>
                <input type="password" name="password" required>
                <span class="invalid-feedback"><?php echo $data['password_err']?></span>
            <div class="form-group">
                <input type="submit" value="Log In">
            </div>
        </form>
    </div>
</body>
</html>
