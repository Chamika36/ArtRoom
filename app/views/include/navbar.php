<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtRoom</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/manager-styles.css">
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
                <li class="active"><a href="<?php echo URLROOT ?>/home/dash">Home</a></li>
                <li><a href="<?php echo URLROOT ?>/events">Events</a></li>
                <li><a href="<?php echo URLROOT ?>/packages">Packages</a></li>
                <li><a href="<?php echo URLROOT ?>/samples">Gallery</a></li>
                <li><a href="<?php echo URLROOT ?>/users">Users</a></li>

                <?php
                    if (isset($_SESSION['user_id'])) {
                        // User is logged in
                        echo '<li class="right"><a href="'. URLROOT .'/users/logout">Log Out</a></li>';
                    } else {
                        // User is not logged in
                        echo '<li class="right"><a href="'. URLROOT .'/users/login">Log In</a></li>';
                    }
                ?>           
                <!-- User-Specific Items (Added Dynamically using PHP) -->
            </ul>
            <div class="menu-icon" onclick="toggleMenu()">&#9776;</div>    
        </nav>
        <label class="title">Dashboard</label> 
    </div>
    <!-- Content of the Page Goes Here -->
</body>
</html>

<Script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuToggle = document.getElementById("menu-toggle");
        const navUl = document.querySelector("nav ul");

    menuToggle.addEventListener("click", function() {
        navUl.classList.toggle("show-menu");
    });
    });

    const currentUrl = window.location.pathname;
    const navLinks = document.querySelectorAll('nav a');

    for (const link of navLinks) {
        if (link.getAttribute('href') === currentUrl) {
            link.parentElement.classList.add('active');
        }
    }

    function toggleMenu() {
        const menu = document.querySelector('nav ul');
        menu.classList.toggle('show');
    }

</Script>