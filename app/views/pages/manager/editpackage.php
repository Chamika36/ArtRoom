<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Package</title>
    <link rel="stylesheet" href="style.css"> <!-- You can link to your CSS file here -->
</head>
<body>
    <div class="container">
        <h2>Edit Package</h2>
        <form action="<?php echo URLROOT; ?>/packages/edit/<?php echo $data['id']; ?>" method="POST">
            <div class="form-group">
                <label for="name">Package Name:</label>
                <input type="text" name="name" value="<?php echo $data['name']; ?>" required>
                <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" value="<?php echo $data['price']; ?>" required>
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
                <input type="submit" value="Edit Package">
            </div>
        </form>
    </div>
</body>
</html>
