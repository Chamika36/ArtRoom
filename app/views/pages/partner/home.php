<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>\css\partner\home.css">
    <title>Home</title>

</head>
<body>
<div class="container">
        <div id="menu">
            <?php include(APPROOT . '/views/include/partner-sidebar.php'); ?>
        </div>

        <div id="main">

            <div class="availability-container">
          <label for="available-checkbox">Available</label>
          <input type="checkbox" id="available-checkbox" name="availability">
        </div>

        <div class="availability-container">
          <label for="not-available-checkbox">Not Available</label>
          <input type="checkbox" id="not-available-checkbox" name="availability">
        </div>

        <div class="shape-container">
          <div class="shape">
            <p>Number of Requests</p>
          </div>
          <div class="shape">
            <p>Ongoing</br> Events</p>
          </div>
          <div class="shape">
            <p>Completed</br> Events</p>
          </div>
        </div>
      
        </div>

</body>
</html>