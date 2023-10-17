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
    <div class="navbar">
        <nav>          
            <ul>
                <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12 19V5M12 5L5 12M12 5L19 12" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    </a>
                </li>
                <!-- Common Items for All Users -->
                <?php
                    if (isset($_SESSION['user_id'])) {
                        // User is logged in
                        echo '<li class="right"><a href="'. URLROOT .'/users/logout">Log Out</a></li>';
                    } else {
                        // User is not logged in
                        echo '<li class="right"><a href="'. URLROOT .'/users/login">Log In</a></li>';
                    }
                ?>
                <li><a href="#">Home</a></li>
                <li><a href="#">Packages</a></li>
                <li><a href="#">gallery</a></li>
                <li><a href="#">Reviews</a></li>
                <li><a href="#">Request</a></li>
                <li><a href="#">Contact Us</a></li>

                
                
                <!-- User-Specific Items (Added Dynamically using PHP) -->
            </ul>
        </nav>

       
    </div>
    <!-- Content of the Page Goes Here -->
</body>
</html>
