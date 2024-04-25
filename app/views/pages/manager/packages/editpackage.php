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
    <h1 class="form-title">Edit Package</h1>

        <form name="registrationForm" action="<?php echo URLROOT; ?>/packages/edit/<?php echo $data['id']; ?>" method="POST">
        <div class="main-user-info">


        <div class="user-input-box">
            <label for="name">Package Name: </label>
            <input type="text" name="name" value="<?php echo $data['name']?>" required> 
            <span class="invalid-feedback"><?php echo $data['name_err']?></span>
        </div>

        <div class="user-input-box">
            <label for="price">Price: </label>
            <input type="number" name="price" min="0" value="<?php echo $data['price']?>" step="any" required> 
            <span class="invalid-feedback"><?php echo $data['price_err'];?></span>
        </div>

        <div class="user-input-box">
            <label for="description">Package Description: </label>
            <textarea name="description" rows="4" required><?php echo $data['description']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['description_err'];?></span>
        </div>

        <div class="user-input-box">
            <label for="servicesIncluded">Services Included: </label>
            <input type="text" name="servicesIncluded" value="<?php echo $data['servicesIncluded']; ?>">
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




    <!-- <div class="home">
            <div  class="card">
                <h2>Edit Package</h2> -->
                <!-- <form action="<!?php echo URLROOT; ?>/packages/edit/<!?php echo $data['id']; ?>" method="POST"> -->
                    <!-- <div class="form-group"> -->
                        <!-- <label for="name">Package Name:</label> -->
                        <!-- <input type="text" name="name" value="<!?php echo $data['name']; ?>" required>
                        <span class="invalid-feedback"><!?php echo $data['name_err']; ?></span>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" value="<!?php echo $data['price']; ?>" step="any" required>
                        <span class="invalid-feedback"><!?php echo $data['price_err']; ?></span>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" rows="4" required><!?php echo $data['description']; ?></textarea>
                        <span class="invalid-feedback"><!?php echo $data['description_err']; ?></span>
                    </div> -->
                     <!-- <div class="form-group">
                        <label for="servicesIncluded">Services Included:</label>
                        <input type="text" name="servicesIncluded" value="<!?php echo $data['servicesIncluded']; ?>">
                    </div> -->
                    <!-- <div class="form-group">
                        <button class="button"><a href="<!?php echo URLROOT ?>/packages/">Cancel</a></button>
                        <input class="button" type="submit" value="Edit Package">
                    </div> -->