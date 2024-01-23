<head>
    <title>Edit User</title>
</head>
<body>
        <!-- <div class="container"> -->
        <!-- <div id="menu"> -->
            <!-- Sidebar -->
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        <!-- </div> -->

    <div class="home">
            <div  class="card">
                <h2>Edit User</h2>
                <form name="registrationForm" action="<?php echo URLROOT; ?>/users/edit/<?php echo $data['id']; ?>" method="POST">
                <div class="form-group">
                    <label for="firstName">First Name: </label>
                    <input type="text" name="firstName" value="<?php echo $data['firstName']?>" required> 
                    <span class="invalid-feedback"><?php echo $data['first_name_err']?></span>
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name: </label>
                    <input type="text" name="lastName" value="<?php echo $data['lastName']?>" required>
                    <span class="invalid-feedback"><?php echo $data['last_name_err']?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" name="email" value="<?php echo $data['email']?>" required>
                    <span class="invalid-feedback"><?php echo $data['email_err']?></span>
                </div>
                <div class="form-group">
                    <label for="contactNumber">Contact Number: </label>
                    <input type="tel" name="contactNumber" pattern="([0-9]{10})" value="<?php echo $data['contactNumber']?>" required>
                    <span class="invalid-feedback"><?php echo $data['contact_err']?></span>
                </div>
                <div class="form-group">
                    <label for="userType">User Type: </label>
                    <select id="userType" name="userType" required>
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
                    <input type="submit" value="Update User">
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
