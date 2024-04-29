<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css">

    
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
        width: 35%;
        
        /* padding: 50px; */
        border-radius: 15px;
        box-shadow: 2px 6px 10px 0 rgba(0, 0, 0, 0.2);
       
    }



    .branding{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        margin-bottom: 10px;
        

    }
    .artroom-logo{
      width: 75px;
      height: 75px;
      
    }
    .brand-name{
        color: #2E2626;
        font-family: Otomanopee One;
        font-size: 30px;
        font-style: normal;
        font-weight: 400;
        line-height: 118.9%; /* 76.096px */
        
        mix-blend-mode: darken;
        font-weight: bold;
        
    }

    h4{
        margin-bottom: 20px;
    }

    form{
        text-align: left;
        padding: 25px;
    }

    

    label{
        font-size: 16px;
        align-items: left;
        color: #2E2626;
        
        
    }

    input{
        width: 100%;
        height: 28px;
        border-radius: 6px;
        margin-top: 5px;
        margin-bottom: 10px;
        border: 0.5px solid rgba(0, 0, 0, 0.2);
        background-color: #F2F2F2;
        color: #2E2626;
        padding-left: 10px;
    }

    input::placeholder {
        
        opacity: 0.8;
    }

    input:focus {
        background-color: rgba(30, 144, 255, 0.1);
        outline-color: rgba(30, 144, 255, 0.5);
    }

    .name{
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    button{
        background-color: #3b3d3e;
        color: white;
        width: 100%;
        height: 38px;
        border-radius: 6px;
        margin-top: 10px;
        cursor: pointer;
        font-weight: bold;
        transition: 0.2s;
        border: 0.5px solid rgba(0, 0, 0, 0.5);
        font-size: 18px;
        margin-top: 20px;
    }

    button:hover{
        background-color: #f9b234;
        color: black
    }

    h4{
        opacity: 0.6;
    }

    .invalid-feedback{
        color: red;
        font-size: 12px;
    }

    select{
        width: 100%;
        height: 30px;
        border-radius: 6px;
        margin-top: 5px;
        margin-bottom: 10px;
        border: 0.5px solid rgba(0, 0, 0, 0.2);
        background-color: #F2F2F2;
        color: #2E2626;
        padding-left: 10px;
    }

    select:focus{
        background-color: rgba(30, 144, 255, 0.1);
        outline-color: rgba(30, 144, 255, 0.5);

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
        <h1>Create Your Account</h1>
        <!-- <div class="test"> -->
            <form action="<?php echo URLROOT; ?>/users/register" method="POST">
               <div class="name">       
                <div>  
                <label for="First-name">First Name</label>
                <input type="text" name="firstName" placeholder="First Name" value="<?php echo $data['firstName']?>" required></br>
                <span class="invalid-feedback"><?php echo $data['first_name_err']?></span>
                </div>
                <div>                
                <label for="Last-name">Last Name</label>
                <input type="text" name="lastName" placeholder="Last Name" value="<?php echo $data['lastName']?>" required></br>
                <span class="invalid-feedback"><?php echo $data['last_name_err']?></span>
                </div>
               </div>                 
                <label for="email">Email</label></br>
                <input type="email" name="email" placeholder="Email" value="<?php echo $data['email']?>" required></br>
                <span class="invalid-feedback"><?php echo $data['email_err']?></span>
                                
                <label for="contact-num">Contact Number</label>
                <input type="tel" name="contactNumber" pattern="([0-9]{10})" placeholder="Contact Number" value="<?php echo $data['contactNumber']?>" required></br>
                <span class="invalid-feedback"><?php echo $data['contact_err']?></span>
                            
                <label for="password">Password</label></br>
                <input type="password" name="password" placeholder="Password" value="<?php echo $data['password']?>" required></br>
                <span class="invalid-feedback"><?php echo $data['password_err']?></span>
                                
                <label for="confirm-password">Confirm Password</label>
                <input type="password" name="confirmPassword" placeholder="Confirm Password" value="<?php echo $data['confirmPassword']?>" required></br>
                <span class="invalid-feedback"><?php echo $data['confirm_password_err']?></span>
                
                    <label for="user-type">User Type</label></br>                        
                        <select id="userType" name="userType" required>
                            <option value="" disabled selected>Select a type</option>
                            <option value="1">Customer</option>
                            <!-- <option value="2">Manager</option> -->
                            <option value="3">Photographer</option>
                            <option value="4">Editor</option>
                            <option value="5">Printing Firm</option>
                        </select>
                            
                    <div id="specialization-group" style="display: none">
                        
                        <label for="specialization">Specialization</label></br>
                            <select name="specialization" id="specialization">
                                <option value="">Select Specialization</option>
                                <option value="Indoor">Indoor</option>
                                <option value="Outdoor">Outdoor</option>
                            </select>
                            
                    </div>
                                    
                <button type="submit" value="Register">Register</button>
                                        
                                    
                               
            </form>
        <!-- </div> -->
    </section>
</body>
</html>

<script>
    document.getElementById("userType").addEventListener("change", function() {
        var userType = this.value;
        var specializationGroup = document.getElementById("specialization-group");

        if (userType === "3" || userType === "4") {
            specializationGroup.style.display = "block";
        } else {
            specializationGroup.style.display = "none";
        }
    });
</script>

