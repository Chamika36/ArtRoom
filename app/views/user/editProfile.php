<head>
    <title>Edit User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/edituser.css">
</head>
<body>

    <?php //include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>

   
    <div class="container">
    <h1 class="form-title">Edit User</h1>
                <form name="registrationForm" action="<?php echo URLROOT; ?>/users/editProfile/<?php echo $_SESSION['user_id']; ?>" method="POST">
                <div class="main-user-info">
          
                <div class="user-input-box">
                    <label for="firstName">First Name: </label>
                    <input type="text" name="firstName" value="<?php echo $data['firstName']?>" required> 
                    <span class="invalid-feedback"><?php echo $data['first_name_err']?></span>
                </div>
                <div class="user-input-box">
                    <label for="lastName">Last Name: </label>
                    <input type="text" name="lastName" value="<?php echo $data['lastName']?>" required>
                    <span class="invalid-feedback"><?php echo $data['last_name_err']?></span>
                </div>
                <div class="user-input-box">
                    <label for="email">Email: </label>
                    <input type="email" name="email" value="<?php echo $data['email']?>" required>
                    <span class="invalid-feedback"><?php echo $data['email_err']?></span>
                </div>
                <div class="user-input-box">
                    <label for="userType">Old Password: </label>
                    <input type="password" name="oldPassword" value="<?php echo $data['oldPassword']?>" required>
                    <span class="invalid-feedback"><?php echo $data['old_password_err']?></span>
                </div>
                <div class="user-input-box">
                    <label for="password">Password: </label>
                    <input type="password" name="password" value="<?php echo $data['password']?>" required>
                    <span class="invalid-feedback"><?php echo $data['password_err']?></span>
                </div>
                <div class="user-input-box">
                    <label for="userType">Confirm Password: </label>
                    <input type="password" name="confirmPassword" value="<?php echo $data['confirmPassword']?>" required>
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']?></span>
                </div>
                <div class="user-input-box">
                    <label for="userType">
                <div class="user-input-box">
                    <label for="contactNumber">Contact Number: </label>
                    <input type="tel" name="contactNumber" pattern="([0-9]{10})" value="<?php echo $data['contactNumber']?>" required>
                    <span class="invalid-feedback"><?php echo $data['contact_err']?></span>
                </div>
                <div class="user-input-box" id="specialization-group" style="display: none;">
                    <label for="specialization">Specialization:</label>
                    <select name="specialization" id="specialization">
                        <option value="">Select Specialization</option>
                        <option value="Indoor">Indoor</option>
                        <option value="Outdoor">Outdoor</option>
                    </select>
                </div>

                <div class="form-submit-btn">
                    <input type="submit" value="Cancel" onclick="window.history.back();" class="cancel-btn">
                    <input type="submit" value="Update User" class="update-btn">
                </div>


            </form>
            </div>
        </div>
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