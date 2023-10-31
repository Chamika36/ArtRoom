<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-02</title>    
    <link rel="stylesheet" href="../../../../public/css/customer-navbar.css">
    <link rel="stylesheet" href="../../../../public/css/grid.css">
    <link rel="stylesheet" href="../../../../public/css/logo.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
<style>
    

    .background{
        background: url('<?php echo URLROOT ?>/images/login-backgroung.png'); 
        max-width: 100%;
        height: auto;
        background-size: cover;
        background-position: center;
        opacity: 0.9;
       }

       .form{
        backdrop-filter: blur(16px) saturate(180%);
        webkit-backdrop-filter: blur(16px) saturate(180%);
        background-color: rgba(255, 255, 255, 0.75);
        border-radius: 12px;
        border: 1px solid rgba(209, 213, 219, 0.3);
        width: 300px; /* Set a width for your form container */
        background-color: #f0f0f0;
        padding: 20px;
        display: flex;
        justify-content: space-around;
        flex-direction:column;
        align-items: center;
        height: 50vh;
        width: 40%;
        margin-left: 30%;
        
       }

       .login{
        width: 125px;
        height: 37px;
        flex-shrink: 0;
        color: #FFF;
        text-align: center;
        text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        font-family: Jua;
        font-size: 30px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-left: 46%;
        margin-top: 6%;
       }

       .email{
        color: #000;
        text-align: right;
        font-family: Istok Web;
        font-size: 22px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        letter-spacing: 1.1px;
        
       }

       .textBox{
        width: 329px;
        height: 43px;
        flex-shrink: 0;
        fill: rgba(217, 217, 217, 0.75);
        mix-blend-mode: color-dodge;
       }

       .logInButton{
        width: 103px;
        height: 45px;
        flex-shrink: 0;
        background-color: #1E1E1E; /* Set the desired background color */
        color: #ffffff;
        margin-left: auto;
        border-radius: 25px;
       }

       
</style>
</head>
<body class="background">
    <div >
    <!-- <img src="images/login-backgroung.png" alt="background img" class="background"> -->
        <h2 class="login">Login</h2>
        <div class="form">
            <?php flash('register_success'); ?>
            <form name="logInForm" style="display:flex; flex-direction: column; justify-content: flex-end; align-items: flex-end; "  action="<?php echo URLROOT; ?>/users/login" method="POST">
                <div class="form-group" style="margin-bottom:10px">
                    <label class="email" for="email">Email: <sup>*</sup></label>
                    <input class="textBox" type="email" name="email" required>
                    <span class="invalid-feedback"><?php echo $data['email_err']?></span>
                </div> 
                <div class="form-group" style="margin-bottom:10px">
                    <label class="email" for="password">Password: <sup>*</sup></label>
                    <input class="textBox" type="password" name="password" required>
                    <span class="invalid-feedback"><?php echo $data['password_err']?></span>
                </div>
                <div class="form-group">
                    <input class="logInButton" type="submit" value="Log In">
                </div>
            </form>
            <a href="">Forgot Password?</a>
            <h4>Don't have an account? <a href="">Sign Up</a></h4>
            
        </div>

    </div>
</body>
</html>
