<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/edituser.css">
    <title>Edit Partner Profile</title>
</head>
<body>
   <?php include(APPROOT . '/views/include/partner-sidebar.php'); ?>
    
    <div class="home">
      <div class="container">
         <div class="branding">
            <img class="artroom-logo" src="<?php echo URLROOT?>/images/logo.png" alt="logo">
               <h1 class="brand-name">ArtRoom</h1>
         </div>
         <form action="<?php echo URLROOT; ?>/partners/editPartner/<?php echo $data['id']; ?>" method="post">
               <h2 class="form-title">User Profile</h2>
               <div class="main-user-info">
                  <div class="user-input-box">
                  <label for="FirstName">First Name:</label>
                <input type="text" name="FirstName" id="FirstName" value="<?php echo $data['FirstName']; ?>" required>
                  </div>
                  <div class="user-input-box">
                  <label for="LastName">Last Name:</label>
                <input type="text" name="LastName" id="LastName" value="<?php echo $data['LastName']; ?>" required>
                  </div>
                  <div class="user-input-box">
                  <label for="Bio">Bio:</label>
                <textarea name="Bio" id="Bio" rows="4"><?php echo $data['Bio']; ?></textarea>
                  </div>
               </div>
               <div class="form-submit-btn">
                  <input type="submit" value="Update Profile">
               </div>
         </form>
      </div>
   </div>
</body>
</html>
