<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../../../public/css/dashboard.css">
    <link rel="stylesheet" href="../../../../public/css/navbar.css">
    <link rel="stylesheet" href="../../../../public/css/grid.css">  
</head>

<body>

    <div class="container">
        <!-- Navbar -->
        <div class="item1">
            <?php include('../../include/navbar.php'); ?>
        </div>
        
        <div class="item2">
            <?php include('./sidebar.php'); ?>
        </div>
        
        <!-- Dashboard -->
        <div class="item3">
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

