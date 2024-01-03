<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="style.css"> <!-- You can link to your CSS file here -->

    <style> 
    .background{
        background: url('<?php echo URLROOT ?>/images/login-backgroung.png'); 
        max-width: 100%;
        height: auto;
        background-size: cover;
        background-position: center;
        opacity: 0.9;
    }

    .signUp{
        width: 150px;
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
        margin-top: 3%;
    }

    .form{
        backdrop-filter: blur(16px) saturate(150%);
        webkit-backdrop-filter: blur(20px) saturate(150%);
        background-color: rgba(255, 255, 255, 0.7);
        border-radius: 12px;
        border: 5px solid rgba(209, 213, 219, 0.3);
        width: 300px; /* Set a width for your form container */
        padding: 20px;
        display: flex;
        justify-content: space-around;
        flex-direction:column;
        align-items: center;
        height: 60vh;
        width: 40%;
        margin-left: 30%; 
        margin-top: 1%; 
         
    }  

    .text{
        width: 145px;
        color: #000;
        text-align: center;
        font-family: Istok Web;
        font-size: 19px;
        font-style: normal;
        font-weight: 700;
        line-height: 3px; /* 15.789% */
        letter-spacing: 0.95px;
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
    padding-left: 10px;
    }

    .textBox:hover {
    border-color: #000; /* Change border color to black on hover */
    }

    .textBox:focus {
    border-color: #000; /* Keep the border black when the input is in focus */
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.5); /* Add a subtle box shadow on focus */
    }


    .registerButton {
    width: 103px;
    height: 45px;
    flex-shrink: 0;
    background-color: rgba(30, 30, 30, 0.7); /* Set initial opacity to 0.7 */
    color: #ffffff;
    margin-left: auto;
    border-radius: 25px;
    transition: background-color 0.2s; /* Add transition for smoother color change */
    }

    .registerButton:hover {
    background-color: rgba(30, 30, 30, 1); /* Increase opacity on hover to 1.0 */
    }

    .registerButton:focus {
    background-color: rgba(30, 30, 30, 1); /* Keep increased opacity on focus */
    outline: none; /* Remove the default focus outline */
    }

    .textBox::placeholder {
    color: rgba(0, 0, 0, 0.5); /* Set a low visibility color (e.g., gray) */
    font-weight: bold; /* Make the text bold */
    background-color: transparent; /* Make the background transparent */
    }


    </style>
</head>
<body class="background">
<h2 class="signUp"><b>Sign Up</b></h2>
    <div class="form">
        
        <form name="registrationForm" style="display:flex; flex-direction: column; justify-content: flex-end; align-items: flex-end;" action="<?php echo URLROOT; ?>/users/register" method="POST">
            <div class="form-group" style="margin-bottom:10px">
                <label class="text" for="firstName">First Name  </label>
                <input class="textBox" type="text" name="firstName" value="<?php echo $data['firstName']?>" required><br>
                <span class="invalid-feedback"><?php echo $data['first_name_err']?></span>
            </div>
            <div class="form-group" style="margin-bottom:10px">
                <label class="text" for="lastName">Last Name  </label>
                <input class="textBox" type="text" name="lastName" value="<?php echo $data['lastName']?>" required><br />
                <span class="invalid-feedback"><?php echo $data['last_name_err']?></span>
            </div>
            <div class="form-group" style="margin-bottom:10px">
                <label class="text" for="email">Email  </label>
                <input class="textBox" type="email" name="email" value="<?php echo $data['email']?>" required><br />
                <span class="invalid-feedback"><?php echo $data['email_err']?></span>
            </div>
            <div class="form-group" style="margin-bottom:10px">
                <label class="text" for="contactNumber">Contact Number  </label>
                <input class="textBox" type="tel" name="contactNumber" pattern="([0-9]{10})" value="<?php echo $data['contactNumber']?>" required><br />
                <span class="invalid-feedback"><?php echo $data['contact_err']?></span>
            </div>
            <div class="form-group" style="margin-bottom:10px">
                <label class="text" for="password">Password  </label>
                <input class="textBox" type="password" name="password" value="<?php echo $data['password']?>" required><br />
                <span class="invalid-feedback"><?php echo $data['password_err']?></span>
            </div>
            <div class="form-group" style="margin-bottom:10px">
                <label class="text" for="confirmPassword">Confirm Password  </label>
                <input class="textBox" type="password" name="confirmPassword" value="<?php echo $data['confirmPassword']?>" required><br />
                <span class="invalid-feedback"><?php echo $data['confirm_password_err']?></span>
            </div>

            <div class="form-group" style="margin-bottom:10px">
                <label class="text" for="userType">User Type  </label>
                <select class="textBox" id="userType" name="userType" required>
                    <option value="" disabled selected>Select a type</option>
                    <option value="1">Customer</option>
                    <option value="2">Manager</option>
                    <option value="3">Photographer</option>
                    <option value="4">Editor</option>
                    <option value="5">Printing Firm</option>
                </select>
            </div>
            <div class="form-group" id="specialization-group" style="display: none;">
                <label for="specialization">Specialization:</label>
                <select name="specialization" id="specialization">
                    <option value="">Select Specialization</option>
                    <option value="Indoor">Indoor</option>
                    <option value="Outdoor">Outdoor</option>
                </select>
            </div>

            <div class="form-group">
                <input class="registerButton" type="submit" value="Register">
            </div>
        </form>
    </div>
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

