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
    

        <!-- <nav>
            <ul>
             Common Items for All Users 
            <?php
                // if (isset($_SESSION['user_id'])) {
                //     // User is logged in
                //     echo '<li class="notification-icon">&#128276;</li>';
                //     echo '<li class="profile-dropdown">';
                //     echo '<div class="profile-info" id="profileTrigger">';
                //     echo '<div class="user-greeting">Hello ' . $_SESSION['user_name'] .'</div>'; // Move greeting here
                //     echo '<img src="' . URLROOT . '/images/pp.png" alt="Profile Picture">';
                //     echo '<div class="arrow-icon">&#9660;</div>';
                //     echo '</div>';
                //     echo '<div class="dropdown-content" id="dropdownMenu">';
                //     echo '<a href="'. URLROOT .'/users/logout">Log Out</a>';
                //     echo '<a href="'. URLROOT .'/events/request">Make a Request</a>';
                //     echo '<a href="'. URLROOT .'/events/viewCustomerEvents/' . $_SESSION['user_id'] . '">Requests</a>';
                //     echo '</div>';
                //     echo '</li>';
                // } else {
                //     // User is not logged in
                //     echo '<li>You are not Logged In</li>';
                //     echo '<li><a href="'. URLROOT .'/users/login">Log In</a></li>';
                // }
            ?>
            </ul> 

            
        </nav> -->
        <nav>
        <header>
        <a href="<?php echo URLROOT ?>">
        <div class="branding">
            <img src="<?php echo URLROOT ?>/images/logo.png" alt="Your Image">
            <span>Art Room</span>
        </div>
        </a>

        
        <div class="topnav">
            <a class="Make a req" href="#home">Make a Request</a>
            
            <a href="#Gallery">Gallery</a>
            
            <a href="#Packages">Packages</a>
        </div>

        <ul>
        <?php
            if (isset($_SESSION['user_id'])) {
                // User is logged in
                echo '<li class="notification-icon"><a>&#128276;</a></li>';
            
                echo '<li>
                            <a>Hello ' . $_SESSION['user_name'] .'</a>
                    </li>';
            
                echo '<li class="profile-dropdown">
                        <a class="arrow-icon">&#9660;</a>
                        <div class="dropdown-content" id="dropdownMenu">
                            <a href="'. URLROOT .'/users/logout">Log Out</a>
                            <a href="'. URLROOT .'/events/request">Make a Request</a>
                            <a href="'. URLROOT .'/events/viewCustomerEvents/' . $_SESSION['user_id'] . '">My Requests</a>
                        </div>
                    </li>';
            } else {
                     // User is not logged in
                     echo '<li>You are not Logged In</li>';
                     echo '<li><a href="'. URLROOT .'/users/login">Log In</a></li>';
            }         
        ?>
        </ul>

    </header>

    

    <script>
        document.getElementById('profileTrigger').addEventListener('click', function() {
            var dropdown = document.getElementById('dropdownMenu');
            dropdown.classList.toggle('show');
        });

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('#profileTrigger, #profileTrigger *')) {
                var dropdown = document.getElementById('dropdownMenu');
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                }
            }
        };
    </script>
</body>



</html>
