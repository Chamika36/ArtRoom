<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="evo-calendar.css" />
    <link rel="stylesheet" href="evo-calendar.midnight-blue.css"/>
</head>

<body>
    <div class="container">
        <div id="header">
            <!-- Navbar -->
            <?php include(APPROOT . '/views/include/navbar.php'); ?>
        </div>

        <div id="menu">Sidebar</div>

        <div id="main">
            <!-- Calendar -->
            <?php include('calendar.php'); ?>
        </div>

    </div>


</body>
</html>