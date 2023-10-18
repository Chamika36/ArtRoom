<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/dashboard.css">
</head>

<body>

    <div class="container">
        <!-- Navbar -->
        <div id="header">
            <?php include(APPROOT . '/views/include/navbar.php'); ?>
        </div>
    
            <div id="menu">
                <?php include('sidebar.php'); ?>
            </div>
            
            <!-- Dashboard -->
            <div id="main">
            <div class="main-box">
                    <div class="box">
                        <a href="#">PHOTOGRAPHERS <br> 54</a>
                    </div>
                    <div class="box">
                        <a href="#">EDITORS <br> 39</a>
                    </div>
                    <div class="box">
                        <a href="#">PRINTING <br> 39</a>
                    </div>
                    <div class="box">
                        <a href="#">Event Requests <br> 39</a>
                    </div>
                    <div class="box">
                        <a href="#">Ongoing Events <br> 39</a>
                    </div>
                </div>
            </div>
    </div>

</body>
</html>

