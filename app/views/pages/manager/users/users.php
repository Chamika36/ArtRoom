<head>
    <title>Packages</title>
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
            <div class ="rows">
                <div class="card-users">
                    <h2><a href="<?php echo URLROOT; ?>/users/getcustomers">Customers</a></h2>
                </div>
                <div class="card-users">
                    <h2><a href="<?php echo URLROOT; ?>/users/getPhotographers">Photographers</a></h2>
                </div>
                <div class="card-users">
                    <h2><a href="<?php echo URLROOT; ?>/users/getPrintingfirms">Printing Firms</a></h2>
                </div>
                <div class="card-users">
                    <h2><a href="<?php echo URLROOT; ?>/users/getEditors">Editors</a></h2>
                </div>
            </div>
        </div>
    </div>
</body>
                    
                