<head>
    <title>Edit Package</title>
</head>
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
                <h2>Edit Samples</h2>
                <form action="<?php echo URLROOT; ?>/samples/edit/<?php echo $data['id']; ?>" method="POST">
                    <div class="form-group">
                        <label for="name">Sample Name:</label>
                        <input type="text" name="name" value="<?php echo $data['name']; ?>" required>
                        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="imagePath">Image:</label>
                        <input type="text" name="imagePath" value="<?php echo $data['imagePath']; ?>" required>
                        <span class="invalid-feedback"><?php echo $data['imagePath_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" rows="4" required><?php echo $data['description']; ?></textarea>
                        <span class="invalid-feedback"><?php echo $data['description_err']; ?></span>
                    </div>
                    <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" name="date" value="<?php echo $data['date']; ?>">
                    </div>
                    <div class="form-group">
                        <button class="button"><a href="<?php echo URLROOT ?>/samples/">Cancel</a></button>
                        <input class="button" type="submit" value="Edit Sample">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
        <button><a href="<?php echo URLROOT ?>/packages/editpackage">Edit Packages</a></button>
    </div>
</body>
</html>
