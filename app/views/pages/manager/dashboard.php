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
        <div id="menu">
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        </div>
        <!-- Dashboard -->
        <div id="main">
            <div class="dash">
                <div class="horizontal-box">
                    <div class="box">
                        <a href="<?php echo URLROOT ?>/events">
                            <div class="box-icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="box-content">
                                <h2>Event Requests</h2>
                                <p><?php echo is_array($data['eventCount']) ? count($data['eventCount']) : $data['eventCount']; ?></p>
                            </div>
                        </a>
                    </div>

                    <div class="box">
                        <a href="<?php echo URLROOT ?>/events">
                            <div class="box-icon">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="box-content">
                                <h2>Ongoing Events</h2>
                                <p><?php echo is_array($data['requestCount']) ? count($data['requestCount']) : $data['requestCount']; ?></p>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="main-box">
                    <div class="box">
                        <a href="<?php echo URLROOT ?>/users/getPhotographers">
                            <div class="box-icon">
                                <i class="fas fa-camera"></i>
                            </div>
                            <div class="box-content">
                                <h2>PHOTOGRAPHERS</h2>
                                <p>5</p>
                            </div>
                        </a>
                    </div>
                    <div class="box">
                        <a href="<?php echo URLROOT ?>/users/getEditors">
                            <div class="box-icon">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div class="box-content">
                                <h2>EDITORS</h2>
                                <p>2</p>
                            </div>
                        </a>
                    </div>
                    <div class="box">
                        <a href="<?php echo URLROOT ?>/users/getPrintingFirms">
                            <div class="box-icon">
                                <i class="fas fa-print"></i>
                            </div>
                            <div class="box-content">
                                <h2>PRINTING</h2>
                                <p>10</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
