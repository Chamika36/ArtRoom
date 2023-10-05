<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/dashboard.css">
</head>

<body>

    <div class="container">
        <!-- Navbar -->
        <div class="header">
            <?php include(APPROOT . '/views/include/navbar.php'); ?>
        </div>
        
        <div class="menu">
            <?php include('./sidebar.php'); ?>
        </div>
        
        <!-- Dashboard -->
        <div class="main">
            <div class="main-box">
            <div>
                <a class="box" href="#">PHOTOGRAPHERS <br />54</a>
                <a class="box" href="#">EDITORS <br />39</a>
                <a class="box" href="#">PRINTING <br />39</a>
                <a class="box" href="#">Event Requests <br />39</a>
                <a class="box" href="#">Ongoing Events <br />39</a>
            </div>
            </div>
        </div>  
    </div>

</body>
</html>

