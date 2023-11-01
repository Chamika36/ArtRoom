<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Three Areas Layout</title>
    <link rel="stylesheet" href="../../../../public/css/customer-navbar.css">
    <link rel="stylesheet" href="../../../../public/css/grid.css">
    <link rel="stylesheet" href="../../../../public/css/logo.css">
    <link rel="stylesheet" href="../../../../public/css/customer-mainPages.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    
</head>
<body>
    <div>
    <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
    </div>
    <div class="container">
        <div class="bottom-row">
            <div class="left-area">
                <div class="button">Button 1</div>
                <div class="button">Button 2</div>
                <div class="button">Button 3</div>
                <div class="button">Button 4</div>
            </div>
            <div class="bottom-column">
                Right Area
            </div>
        </div>
    </div>
</body>
</html>
