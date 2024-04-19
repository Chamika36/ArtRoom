<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <h1>Password Reset</h1>
    <form method="POST">
        <label for="otp">Enter OTP:</label>
        <input type="text" id="otp" name="otp" required><br><br>
        
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>