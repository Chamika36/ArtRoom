<head>
    <title>Add Package</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/edituser.css">
</head>
<body>

        <!-- Sidebar -->
        <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>

        <div class="container">
        <h1 class="form-title">Add Package</h1>
            <form name="registrationForm" action="<?php echo URLROOT; ?>/packages/add" method="POST">
            <div class="main-user-info">

            <div class="user-input-box">
                <label for="name">Package Name: </label>
                <input type="text" name="name" value="<?php echo $data['name']; ?>" required> 
                <span class="invalid-feedback"><?php echo $data['name_err']?></span>
            </div>

            <div class="user-input-box">
                <label for="price">Price: </label>
                <input type="number" name="price" value="<?php echo $data['price']; ?>" required> 
                <span class="invalid-feedback"><?php echo $data['price_err']?></span>
            </div>


            <div class="user-input-box">
                <label for="description">Description: </label>
                <textarea name="description" rows="4" required><?php echo $data['description']; ?></textarea>
                <span class="invalid-feedback"><?php echo $data['description_err']?></span>
            </div>

            <div class="user-input-box">
                <label for="servicesIncluded">Services Included: </label>
                <input type="text" name="servicesIncluded" value="<?php echo $data['servicesIncluded']; ?>">
            </div>

            <div class="form-submit-btn">
                <input type="submit" value="Cancel" onclick="window.history.back();" class="cancel-btn">
                <input type="submit" value="Add Package" class="update-btn">
            </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>


