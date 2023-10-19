<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../../../public/css/calendar.css">
    <link rel="stylesheet" href="../../../../public/css/navbar.css">
    <link rel="stylesheet" href="../../../../public/css/grid.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />

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