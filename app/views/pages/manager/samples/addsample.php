<head>
    <title>Add Sample</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/package.css">
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
                <h2>Add Sample</h2>
                <form name="addPackageForm" action="<?php echo URLROOT; ?>/samples/add" method="POST">
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
                           <label for="customer">Customer:</label>
                            <select name="customer" id="customer">
                                <?php foreach ($data['customers'] as $customer) : ?>
                                    <option value="<?php echo $customer->UserID; ?>"><?php echo $customer->FirstName . " " . $customer->LastName; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="button"><a href="<?php echo URLROOT ?>/samples/samples">Cancel</a></button>
                            <input class="button" type="submit" value="Add Sample">
                        </div>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>