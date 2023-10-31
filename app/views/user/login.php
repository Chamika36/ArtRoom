<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
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
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 12px;
        border: 1px solid rgba(209, 213, 219, 0.3);
        width: 300px; /* Set a width for your form container */
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
        font-style: bold;
        font-weight: 700;
        line-height: normal;
        letter-spacing: 1.1px;
        
       }

       .textBox {
        width: 329px;
        height: 40px;
        flex-shrink: 0;
        border-radius: 15px;
        border: 1px solid transparent; /* Set the initial border to transparent */
        color: #000;
        transition: border-color 0.3s; 
        line-height: 40px;
        background-color: rgba(255, 255, 255, 1);
        }

        .textBox:hover {
        border-color: #000; /* Change border color to black on hover */
        }

        .textBox:focus {
        border-color: #000; /* Keep the border black when the input is in focus */
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5); /* Add a subtle box shadow on focus */
        }

        .logInButton {
    width: 103px;
    height: 45px;
    flex-shrink: 0;
    background-color: rgba(30, 30, 30, 0.7); /* Set initial opacity to 0.7 */
    color: #ffffff;
    margin-left: auto;
    border-radius: 25px;
    transition: background-color 0.2s; /* Add transition for smoother color change */
}

.logInButton:hover {
    background-color: rgba(30, 30, 30, 1); /* Increase opacity on hover to 1.0 */
}

.logInButton:focus {
    background-color: rgba(30, 30, 30, 1); /* Keep increased opacity on focus */
    outline: none; /* Remove the default focus outline */
}



       .forgotPass{
        width: 223px;
        height: 19px;
        flex-shrink: 0;
        color: #000;
        text-align: center;
        text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        font-family: Istok Web;
        font-size: 18px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        letter-spacing: 0.9px;
       }

       
</style>
</head>
<body class="background">
    <div >
    <!-- <img src="images/login-backgroung.png" alt="background img" class="background"> -->
        <h2 class="login"><b>Login</b></h2>
        <div class="form">
            <?php flash('register_success'); ?>
            <form name="logInForm" style="display:flex; flex-direction: column; justify-content: flex-end; align-items: flex-end; "  action="<?php echo URLROOT; ?>/users/login" method="POST">
                <div class="form-group" style="margin-bottom:10px">
                    <label class="email" for="email">Email </label>
                    <input class="textBox" type="email" name="email" required>
                    <span class="invalid-feedback"><?php echo $data['email_err']?></span>
                </div> 
                <div class="form-group" style="margin-bottom:10px">
                    <label class="email" for="password">Password </label>
                    <input class="textBox" type="password" name="password" required>
                    <span class="invalid-feedback"><?php echo $data['password_err']?></span>
                </div>
                <div class="form-group">
                    <input class="logInButton" type="submit" value="Log In">
                </div>
            </form>
            <a class="forgotPass" href="">Forgot Password?</a>
            <h4 class="forgotPass">Don't have an account? <a href="" style="color: blue;">Sign Up</a></h4>
            
        </div>

    </div>
</body>
</html>
