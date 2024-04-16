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
    .main1 .registerForm{
    background-color: #FEFEFE;
    display: grid;
    grid-template-columns: 55% 45%;
    margin: 30px 160px 30px 160px;
    border-radius: 20px;
    box-shadow: 0px 5px 5px rgba(0, 0, 0, 0.25);
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
    grid-template-rows: 37% 62%;
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
    color: #2E2626;
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

.formcontainer{
   margin-top: -150px;
   width: 100%;
}

.formcontainer input{
    width: 100%;
    height: 30px;
    border-radius: 10px;
    margin-bottom: -10px;
    margin-top: -10px;
}


.login-button button{
    border-radius: 15px;
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
  margin-top: 20px;
   display: flex;
   justify-content: center;
} 

.formcontainer .invalid-feedback{
    color:red;
    
}

.select-box{
    display: flex;
    justify-content: left;
    align-items: center;
    margin-top: 10px;
    margin-right: 50px;
    
}

.select-box select{
    width: 100%;
    height: 30px;
    border-radius: 8px;
    
}
.special-box{
    display: flex;
    justify-content: right;
    align-items: center;
    margin-top: 10px;
    margin-right: 50px;
    display: none
}

.special-container{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
    margin-right: 50px;
     
    width: 100%;
}
    </style>

</head>
<body>
    <section class="main1">
        <div class="registerForm">
            <div class="formLeft">
            <h2 class="c1_2"><b>Create Your Account</b></h2>

                <div class="c2">
                
                    <form action="<?php echo URLROOT; ?>/users/register" method="POST">
                        <div class="formcontainer">
                                
                                    <p>First Name</p>
                                    <input type="text" name="firstName" value="<?php echo $data['firstName']?>" required><br>
                                    <span class="invalid-feedback"><?php echo $data['first_name_err']?></span>
                                
                                    <p>Last Name</p>
                                    <input type="text" name="lastName" value="<?php echo $data['lastName']?>" required><br />
                                    <span class="invalid-feedback"><?php echo $data['last_name_err']?></span>
                                
                                    <p>Email</p>
                                    <input type="email" name="email" value="<?php echo $data['email']?>" required><br />
                                    <span class="invalid-feedback"><?php echo $data['email_err']?></span>
                                
                                    <p>Contact Number</p>
                                    <input type="tel" name="contactNumber" pattern="([0-9]{10})" value="<?php echo $data['contactNumber']?>" required><br />
                                    <span class="invalid-feedback"><?php echo $data['contact_err']?></span>
                            
                                    <p>Password</p>
                                    <input type="password" name="password" value="<?php echo $data['password']?>" required><br />
                                    <span class="invalid-feedback"><?php echo $data['password_err']?></span>
                                
                                    <p>Confirm Password</p>
                                    <input type="password" name="confirmPassword" value="<?php echo $data['confirmPassword']?>" required><br />
                                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']?></span>
                                    <div class="special-container">
                                        <div class="select-box">
                                            <div>
                                                <p>User Type : </p>
                                            </div>
                                            <div>
                                                <select id="userType" name="userType" required>
                                                    <option value="" disabled selected>Select a type</option>
                                                    <option value="1">Customer</option>
                                                    <option value="2">Manager</option>
                                                    <option value="3">Photographer</option>
                                                    <option value="4">Editor</option>
                                                    <option value="5">Printing Firm</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="special-box" id="specialization-group">
                                            <div>
                                                <p for="specialization">Specialization</p>
                                            </div>
                                            <div>
                                                <select name="specialization" id="specialization">
                                                    <option value="">Select Specialization</option>
                                                    <option value="Indoor">Indoor</option>
                                                    <option value="Outdoor">Outdoor</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="login-button">
                                        <div class="buttonCA"><button type="submit" value="Register">Register</button></div>
                                        <!-- <input class="buttonCA" type="submit" value="Register"> -->
                                    </div>
                        </div>        
                    </form>
                </div>
            </div>
            <div class="image">
                <img src="<?php echo URLROOT?>/images/register.jpg" alt="image">
            </div>
        </div>    
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

