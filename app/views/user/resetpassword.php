<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
    <style>
        body{
            background-color:#FBF9F3;
            font-family: "Poppins", sans-serif;
        
    }

    section{
        background-color:#fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        align-items: center;
        width: 28%;
        
        padding: 30px;
        border-radius: 15px;
        box-shadow: 2px 6px 10px 0 rgba(0, 0, 0, 0.2);
       
    }

    .branding{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        margin-bottom: 35px;
        

    }
    .artroom-logo{
      width: 90px;
      height: 90px;
      
    }
    .brand-name{
        color: #2E2626;
        font-family: Otomanopee One;
        font-size: 40px;
        font-style: normal;
        font-weight: 400;
        line-height: 118.9%; /* 76.096px */
        
        mix-blend-mode: darken;
        font-weight: bold;
        
    }

    label{
        font-size: 16px;
        
        color: #2E2626;
        margin-top: 20px;
        
    }

    input{
        width: 80%;
        height: 30px;
        border-radius: 6px;
        margin-top: 10px;
        border: 0.5px solid rgba(0, 0, 0, 0.2);
        background-color: #F2F2F2;
        color: #2E2626;
        text-align: center;
    }

    input::placeholder {
        text-align: center;
        opacity: 0.8;
    }

    input:focus {
        background-color: rgba(30, 144, 255, 0.1);
        outline-color: rgba(30, 144, 255, 0.5);
    
    }



    button{
        background-color: #3b3d3e;
        color: white;
        width: 82%;
        height: 38px;
        border-radius: 6px;
        margin-top: 10px;
        cursor: pointer;
        font-weight: bold;
        transition: 0.2s;
        border: 0.5px solid rgba(0, 0, 0, 0.5);
        font-size: 15px;
    }

    button:hover{
        background-color: #f9b234;
        color: black
    }

    h4{
        opacity: 0.6;
    }
    

    </style>
</head>
<body>
    <section>
        <div class="branding">
                        
            <div class="artroom-logo">
                <img class="artroom-logo" src="<?php echo URLROOT?>/images/logo.png" alt="logo">
            </div>
            <div class="brand-name">Art Room</div>
        </div>
        <h1>Reset Password </h1>
        <form method="POST">
            <label for="otp">Enter OTP</label>
            <input type="text" id="otp" name="otp" placeholder="Enter OTP" required><br><br>
            
            <label for="password">Enter New Password</label>
            <input type="password" id="password" name="password" placeholder="New Password" required><br><br>
            
            <label for="confirm_password">Confirm New Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required><br><br>
            
            <button type="submit" value="Reset Password">Reset Password</button>
        </form>
    </section>
</body>
</html>