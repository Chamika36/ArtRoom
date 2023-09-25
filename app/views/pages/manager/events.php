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
        <div class="item1">
            <!-- Navbar -->
            <?php include('../../include/navbar.php'); ?>
        </div>

        <div class="item2">Sidebar</div>

        <div class="item3">
            <!-- Calendar -->
            <?php include('./calendar.php'); ?>
        </div>

    </div>
</body>
</html>