<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/dashboard.css">
</head>

<body>
    <div class="container">
        <!-- Navbar -->
        <div id="header">
            <?php include(APPROOT . '/views/include/navbar.php'); ?>
        </div>
        <!-- Dashboard -->
        <div id="main">
            <div class="dash"
                <div class="horizontal-box">
                    <div class="box">
                        <a href="#">
                            <div class="box-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="box-content">
                                <h2>Event Requests</h2>
                                <p>39</p>
                            </div>
                        </a>
                    </div>

                    <div class="box">
                        <a href="#">
                            <div class="box-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="box-content">
                                <h2>Ongoing Events</h2>
                                <p>39</p>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="main-box">
                    <div class="box">
                        <a href="#">
                            <div class="box-icon">
                                <i class="fas fa-camera"></i>
                            </div>
                            <div class="box-content">
                                <h2>PHOTOGRAPHERS</h2>
                                <p>54</p>
                            </div>
                        </a>
                    </div>
                    <div class="box">
                        <a href="#">
                            <div class="box-icon">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div class="box-content">
                                <h2>EDITORS</h2>
                                <p>39</p>
                            </div>
                        </a>
                    </div>
                    <div class="box">
                        <a href="#">
                            <div class="box-icon">
                                <i class="fas fa-print"></i>
                            </div>
                            <div class="box-content">
                                <h2>PRINTING</h2>
                                <p>39</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
    </div>
</body>
</html>
