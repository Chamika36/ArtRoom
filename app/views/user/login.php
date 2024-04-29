

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
    padding-left: 10px;
    
}

.login-button button{
    border-radius: 20px;
    background: #3b3d3e;
    color: #FFF;
    font-size: 20px;
    font-style: normal;
    font-weight: 700;
    padding: 10px 30px 10px 30px;
    transition: background 0.3s ease;
    border: none;
}

.login-button button:hover {
    background: #f9b234;
    color: black; /* Change the background color on hover */
}

.login-button #forgot{
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10px;
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
                            
                            <div class="buttonCA"><button type="submit">Log In</button></div><br>
                            <span class="buttonCA">Don't have an Account? <a href="<?php echo URLROOT?>/users/register"> Create Account</a></span>
                            <span id="forgot"> <a href="<?php echo URLROOT?>/users/forgotpassword" style="font-weight:normal"><b>Forgot Password?</b></a></span>
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