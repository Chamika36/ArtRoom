<!DOCTYPE html>
<html>
<head>
    <title>Add Sample</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/edituser.css">
</head>

<body>
    <!-- Sidebar -->
    <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
  
    <div class="container">
    <h1 class="form-title">Add Sample</h1>
        <form name="registrationForm" action="<?php echo URLROOT; ?>/samples/add" method="POST" enctype="multipart/form-data">
        <div class="main-user-info">
            <div class="user-input-box">
                <label for="name">Sample Name: </label>
                <input type="text" name="name" value="<?php echo $data['name']; ?>" required> 
                <span class="invalid-feedback"><?php echo $data['name_err']?></span>
            </div>

            <div class="user-input-box">
                <label for="image">Image: </label>
                <input type="file" name="image" required> 
                <span class="invalid-feedback"><?php echo $data['imagePath_err']?></span>
            </div> 

            <div class="user-input-box">
                <label for="description"> Description: </label>
                <textarea name="description" rows="4" required><?php echo $data['description']; ?></textarea>
                <span class="invalid-feedback"><?php echo $data['description_err']?></span>
            </div>

            <div class="user-input-box">
                <label for="date">Date: </label>
                <input type="date" name="date" value="<?php echo $data['date']; ?>" required> 
                <span class="invalid-feedback"><?php echo $data['date_err']?></span>
            </div>
                        
            <div class="user-input-box">
                <label for="customer"> Customer: </label>
                <select name="customer" id="customer">
                    <?php foreach ($data['customers'] as $customer) : ?>
                        <option value="<?php echo $customer->UserID; ?>"><?php echo $customer->FirstName . " " . $customer->LastName; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>            
                        
            <div class="form-submit-btn">
                <input type="submit" value="Cancel" onclick="window.history.back();" class="cancel-btn">
                <input type="submit" value="Add Sample" class="update-btn">
            </div>
        </div>
    </form>
    </div>
</body>
</html>
