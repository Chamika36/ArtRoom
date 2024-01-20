<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/usercard.css">
</head>
<body>
    <div class="container">
        <div id="menu">
            <!-- Sidebar -->
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        </div>

        <div id="main">
            <div class="rows">
                <div class="card-users">
                    <img src="path_to_customers_image.jpg" alt="Customers Image">
                    <h2><a href="<?php echo URLROOT; ?>/users/getcustomers">Customers</a></h2>
                </div>
                <div class="card-users">
                    <img src="path_to_photographers_image.jpg" alt="Photographers Image">
                    <h2><a href="<?php echo URLROOT; ?>/users/getPhotographers">Photographers</a></h2>
                </div>
                <div class="card-users">
                    <img src="path_to_printingfirms_image.jpg" alt="Printing Firms Image">
                    <h2><a href="<?php echo URLROOT; ?>/users/getPrintingfirms">Printing Firms</a></h2>
                </div>
                <div class="card-users">
                    <img src="path_to_editors_image.jpg" alt="Editors Image">
                    <h2><a href="<?php echo URLROOT; ?>/users/getEditors">Editors</a></h2>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
