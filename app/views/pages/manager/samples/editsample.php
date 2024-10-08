<head>
    <title>Edit Package</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/edituser.css">
</head>

<body>
    <!-- Sidebar -->
    <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>

    <div class="container">
    <h1 class="form-title">Edit Samples</h1>
    
                <form name="registrationForm" action="<?php echo URLROOT; ?>/samples/edit/<?php echo $data['id']; ?>" method="POST">
                <div class="main-user-info">
                    
                    <div class="user-input-box">
                        <label for="name">Sample Name: </label>
                        <input type="text" name="name" value="<?php echo $data['name']?>" required> 
                        <span class="invalid-feedback"><?php echo $data['name_err']?></span>
                    </div>

                    <div class="user-input-box">
                        <label for="images">Cover Image: </label>
                        <input type="file" name="images" value="<!?php echo $data['coverImagePath']?>" required> 
                        <span class="invalid-feedback"><?php echo $data['imagePath_err']?></span>
                    </div>

                    <div class="user-input-box">
                        <label for="images">Sample Image: </label>
                        <input type="file" name="images[]" value="" multiple> 
                        <span class="invalid-feedback"><?php echo $data['imagePath_err']?></span>
                    </div>

                    <div class="user-input-box">
                        <label for="description">Description: </label>
                        <textarea name="description" rows="4" required><?php echo $data['description']; ?></textarea>
                        <span class="invalid-feedback"><?php echo $data['description_err']?></span>
                    </div>

                    <div class="user-input-box">
                        <label for="date">Date: </label>
                        <input type="date" name="date" value="<?php echo $data['date']?>" required> 
                        <span class="invalid-feedback"><?php echo $data['date_err']?></span>
                    </div>

                    <div class="user-input-box">
                        <label for="photographer"> Photographer : </label>
                        <select name="photographer" id="photographer">
                            <?php foreach ($data['photographers'] as $photographer) : ?>
                                <option value="<?php echo $photographer->UserID; ?>"><?php echo $photographer->FirstName . " " . $photographer->LastName; ?></option>
                            <?php endforeach; ?>
                        </select>
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
                        <input type="submit" value="Update" class="save-btn">
                    </div>
                    
                
                </form>
            </div>
        </div>
    </div>
</body>
</html>
