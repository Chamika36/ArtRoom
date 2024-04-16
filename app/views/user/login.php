<!--
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
        background: url('<//?php echo URLROOT ?>/images/login-backgroung.png'); 
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
        border: 1px solid transparent; 
        color: #000;
        transition: border-color 0.3s; 
        line-height: 40px;
        background-color: rgba(255, 255, 255, 1);
        }

        .textBox:hover {
        border-color: #000; 
        }

        .textBox:focus {
        border-color: #000; 
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5); 
        }

        .logInButton {
    width: 103px;
    height: 45px;
    flex-shrink: 0;
    background-color: rgba(30, 30, 30, 0.7); 
    color: #ffffff;
    margin-left: auto;
    border-radius: 25px;
    transition: background-color 0.2s; 
}

.logInButton:hover {
    background-color: rgba(30, 30, 30, 1); 
}

.logInButton:focus {
    background-color: rgba(30, 30, 30, 1); 
    outline: none; 
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
     //<img src="images/login-backgroung.png" alt="background img" class="background"> 
        <h2 class="login"><b>Login</b></h2>
        <div class="form">
            <//?php flash('register_success'); ?>
            <form name="logInForm" style="display:flex; flex-direction: column; justify-content: flex-end; align-items: flex-end; "  action="<?php echo URLROOT; ?>/users/login" method="POST">
                <div class="form-group" style="margin-bottom:10px">
                    <label class="email" for="email">Email </label>
                    <input class="textBox" type="email" name="email" required></br>
                    <span class="invalid-feedback"><//?php echo $data['email_err']?></span>
                </div> 
                <div class="form-group" style="margin-bottom:10px">
                    <label class="email" for="password">Password </label>
                    <input class="textBox" type="password" name="password" required></br>
                    <span class="invalid-feedback"><//?php echo $data['password_err']?></span>
                </div>
                <div class="form-group">
                    <input class="logInButton" type="submit" value="Log In">
                </div>
            </form>

            <a class="forgotPass" href="">Forgot Password?</a>
            <h4 class="forgotPass">Don't have an account? <a href="<//?php echo URLROOT; ?>/users/register" style="color: blue;">Sign Up</a></h4>     
        </div>

    </div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>art roomLogin</title>
    
    <link rel="stylesheet" href="<?php echo URLROOT?>/css/login/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Caveat&display=swap" rel="stylesheet">
    <script src="index.js"></script>
    <style>
        body{
    background-color:#FBF9F3;
    font-family: "Poppins", sans-serif;
}
.main1 .registerForm{
    background-color: #FEFEFE;
    display: grid;
    grid-template-columns: 55% 45%;
    margin: 20px 150px 20px 150px;
    box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.25);
    border-radius: 20px;
    
}
.image{
   height: 93vh;
}
.registerForm .image img{
    width: 100%;
    height: 100%;
    margin-bottom: 0px;
    border-radius: 20px;
}

.formLeft{
    display: grid;
    grid-template-rows: 40% 60%;
    padding: 30px;
}
.formLeft .c1{
    display: grid;
    grid-template-rows: 60% 40%;
}
.c1 .c1_1{
    display: grid;
    grid-template-columns: 50% 50%;
}
.c1_1_1{
    max-width: 70%; /* Ensure the div does not exceed its parent's width */
    max-height: 70%; /* Ensure the div does not exceed its parent's height */
    overflow: hidden; /* Hide any overflow if the image is larger than the div */
    text-align: center; /* Center the image horizontally (optional) */
    margin-left: 90px;
}
.c1_1 .c1_1_1 img{
    max-width: 50%; /* Keep the image width within the div */
    max-height: 100%;
    float: right;
    
}
.c1_1_2{
    color: #2E2626;
    font-family: Otomanopee One;
    font-size: 40px;
    font-style: normal;
    font-weight: 400;
    line-height: 118.9%; /* 76.096px */
    
    mix-blend-mode: darken;
    font-weight: bold;
    margin-top: 25px;
    
}
.c1_2{
    color: #605D5D;
text-align: center;
font-size: 26px;
font-style: normal;
font-weight: 400;
line-height: normal;
}

.c2{
    
    /* Center the child horizontally */
   padding-left: 10%;
   padding-right: 10%;
   
}

.formcontainer input{
    width: 100%;
    height: 40px;
    border-radius: 10px;
    
}

.login-button button{
    border-radius: 20px;
    background: #706F6C;
    color: #FFF;
    font-size: 20px;
    font-style: normal;
    font-weight: 700;
    padding: 10px 30px 10px 30px;
    transition: background 0.3s ease;
}

.login-button button:hover {
    background: #242526; /* Change the background color on hover */
}

.login-button #forgot{
    float: right;
    
}
.login-button a{
    text-decoration: none; /* Remove underline */
    color: inherit;
    font-weight: bold;
}
.login-button button{
    cursor: pointer;
}
.login-button .buttonCA{
  
   display: flex;
   justify-content: center;
} 

.formcontainer .invalid-feedback{
    color:red;
    
}

    </style>
</head>
<body>
    <section class="main1">
        <div class="registerForm">
            <div class="formLeft">
                <div class="c1">
                    <div class="c1_1">
                    
                        <div class="c1_1_1">
                            <div style="text-align: center;color: red;"><?//php echo flash('register_success')?></div>
                        
                            <img src="<?php echo URLROOT?>/images/logo.png" alt="logo">
                        </div>
                        <div class="c1_1_2">Art Room</div>
                    </div>
                    <div class="c1_2">Login to book your moments.</br> Your personalized studio experience is just a click away.</div>
                </div>
                
                <div class="c2">
                    <form action="<?php echo URLROOT; ?>/users/login" method="POST"> <!-- Specify the action attribute here -->
                        <div class="formcontainer">
                            <div class="logincred">
                                <p>Email</p>
                                <input type="email" id="email" placeholder="Email" name="email" <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" ><br>
                                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>

                                <p>Password</p>
                                <input type="password" id="login-password" name="password" placeholder="Password"  <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>" ><br>
                                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                            </div>
                        </div>
                        <div class="login-button">
                            <br>
                            <input type="checkbox" ><span>Remember me</span><span id="forgot"> <a href="" style="font-weight:normal">Forgot Password</a></span><br><br>
                            <div class="buttonCA"><button type="submit">Log In</button></div><br>
                            <span class="buttonCA">Don't have an Account? <a href="<?php echo URLROOT?>/users/register"> Create Account</a></span>
                        </div>
                    </form>
                </div>

            </div>
            <div class="image">
                <img src="<?php echo URLROOT?>/images/login-img.jpg" alt="image">
            </div>
        </div>
    </section>
   
</body>
</html>