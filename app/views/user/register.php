<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css"> <!-- You can link to your CSS file here -->

</head>
<body>
    <div class="container">
        <h2>User Registration</h2>
        <form name="registrationForm" action="<?php echo URLROOT; ?>/users/register" method="POST">
            <div class="form-group">
                <label for="firstName">First Name: <sup>*</sup></label>
                <input type="text" name="firstName" class="input-error" required> 
                <span class="invalid-feedback"><?php echo $data['name_err']?></span>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name: <sup>*</sup></label>
                <input type="text" name="lastName" class="input-error">
                <span class="invalid-feedback"><?php echo $data['name_err']?></span>
            </div>
            <div class="form-group">
                <label for="email">Email: <sup>*</sup></label>
                <input type="email" name="email" class="input-error">
                <span class="invalid-feedback"><?php echo $data['email_err']?></span>
            </div>
            <div class="form-group">
                <label for="contactNumber">Contact Number: <sup>*</sup></label>
                <input type="tel" name="contactNumber" class="input-error" pattern="([0-9]{10})">
                <span class="invalid-feedback"><?php echo $data['contact_err']?></span>
            </div>
            <div class="form-group">
                <label for="password">Password: <sup>*</sup></label>
                <input type="password" name="password" class="input-error">
                <span class="invalid-feedback"><?php echo $data['password_err']?></span>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password: <sup>*</sup></label>
                <input type="password" name="confirmPassword" class="input-error">
                <span class="invalid-feedback"><?php echo $data['confirm_password_err']?></span>
            </div>
            <div class="form-group">
                <label for="userType">User Type: </label>
                <select id="userType" name="userType" required>
                    <option value="1">Customer</option>
                    <option value="2">Manager</option>
                    <option value="3">Photographer</option>
                    <option value="4">Editor</option>
                    <option value="5">Printing Firm</option>
                </select>
            </div>
            <div class="form-group">
                <label for="specialization">Specialization (optional):</label>
                <input type="text" name="specialization" class="input-error">
            </div>
            <div class="form-group">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</body>
</html>
