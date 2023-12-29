<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtRoom</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-navbar.css">
</head>

<body>
    <!-- Navbar -->
        <header>
            <div class="branding">
                <img src="<?php echo URLROOT ?>/images/logo.png" alt="Your Image">
                <span>Art Room</span>
            </div>
            
            <nav>
                <ul>
                    <!-- Common Items for All Users -->
                    <?php
                        if (isset($_SESSION['user_id'])) {
                            // User is logged in
                            echo '<li><a href="'. URLROOT .'/users/logout">Log Out</a></li>';
                        } else {
                            // User is not logged in
                            echo '<li>You are not Logged In</li>';
                            echo '<li><a href="'. URLROOT .'/users/login">Log In</a></li>';
                        }
                    ?>
                    <!-- User-Specific Items (Added Dynamically using PHP) -->
                </ul>
            </nav>
        </header>
                
       
    
    <!-- Content of the Page Goes Here -->
</body>
</html>
