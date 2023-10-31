<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Three Areas Layout</title>
    <link rel="stylesheet" href="../../../../public/css/customer-navbar.css">
    <link rel="stylesheet" href="../../../../public/css/grid.css">
    <link rel="stylesheet" href="../../../../public/css/logo.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: rgba(148, 121, 79, 0.7);
            height: 61px;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .bottom-row {
            flex: 4; /* Adjust the flex value to achieve a 1:4 ratio */
            display: flex;
        }

        .left-area {
            flex: 1; /* Adjust the flex value for the left area */
            padding: 20px;
            border: 1px solid #ccc;
            width: 261px; /* Set the width for the left area */
            background-image: url('<?php echo URLROOT ?>/images/customer-sideNavBarBG.png'); /* Add your image URL */
            background-size: cover; /* Adjust the background size as needed */
            background-position: center; /* Adjust the background position as needed */
            opacity: 0.7; /* Set the opacity to 0.7 */
            display: flex;
            flex-direction: column;
        }

        .button {
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin: 5px;
            border-radius: 20px;
            text-align: center;
            cursor: pointer;
        }

        .bottom-column {
            flex: 4; /* Adjust the flex value for the right area */
            padding: 20px;
            border: 1px solid #ccc;
        }
    </style>
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
