<head>
    <title>Edit Package</title>
</head>
<body>
    <div class="container">
        <div id="header">
            <?php include(APPROOT . '/views/include/navbar.php'); ?>
        </div>

        <div id="menu">
                <?php include('sidebar.php'); ?>
        </div>

        <div id="main">
            <div  class="card">
                <h2>Edit Package</h2>
                <form action="<?php echo URLROOT; ?>/packages/edit/<?php echo $data['id']; ?>" method="POST">
                    <div class="form-group">
                        <label for="name">Package Name:</label>
                        <input type="text" name="name" value="<?php echo $data['name']; ?>" required>
                        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" value="<?php echo $data['price']; ?>" step="any" required>
                        <span class="invalid-feedback"><?php echo $data['price_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" rows="4" required><?php echo $data['description']; ?></textarea>
                        <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="servicesIncluded">Services Included:</label>
                        <input type="text" name="servicesIncluded" value="<?php echo $data['servicesIncluded']; ?>">
                    </div>
                    <div class="form-group">
                        <button class="button"><a href="<?php echo URLROOT ?>/packages/">Cancel</a></button>
                        <input class="button" type="submit" value="Edit Package">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
