<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="evo-calendar.css" />
    <link rel="stylesheet" href="evo-calendar.midnight-blue.css"/>
    <title>Events</title>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <!-- <div id="header">
            <//?php include(APPROOT . '/views/include/sidebar/manager-navbar.php'); ?>
        </div> -->
        
        <div id="menu">
            <!-- Sidebar -->
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        </div>


        <div id="main">
            <!-- Calendar -->
            <?php include('calendar.php'); ?>
        </div>

    </div>


</body>
</html>