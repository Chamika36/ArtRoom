<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtRoom</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/manager-styles.css">
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <nav>          
            <ul>
                <li><a href="<?php echo URLROOT ?>/home/manager" onclick="changeActiveItem(0)">Home</a></li>
                <li><a href="<?php echo URLROOT ?>/events" onclick="changeActiveItem(1)">Events</a></li>
                <li><a href="<?php echo URLROOT ?>/packages" onclick="changeActiveItem(2)">Packages</a></li>
                <li><a href="<?php echo URLROOT ?>/samples" onclick="changeActiveItem(3)">Gallery</a></li>
                <li><a href="<?php echo URLROOT ?>/users" onclick="changeActiveItem(4)">Users</a></li>

                <?php
                    if (isset($_SESSION['user_id'])) {
                        // User is logged in
                        echo '<li class="right"><a href="'. URLROOT .'/users/logout">Log Out</a></li>';
                    } else {
                        // User is not logged in
                        echo '<li class="right"><a href="'. URLROOT .'/users/login">Log In</a></li>';
                    }
                ?>           
            </ul>
            <div class="menu-icon" onclick="toggleMenu()">&#9776;</div>    
        </nav>
        <label class="title">Dashboard</label> 
    </div>
    <!-- Content of the Page Goes Here -->

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const titleElement = document.querySelector("title");

            const label = document.querySelector(".title");

            if (titleElement && label) {
                label.innerHTML = titleElement.innerText;
            }
        });

        const currentUrl = window.location.pathname;
        const navLinks = document.querySelectorAll('nav a');
        

        function changeActiveItem(itemIndex) {
            const navLinks = document.querySelectorAll('nav a');
            for (let i = 0; i < navLinks.length; i++) {
                if (i === itemIndex) {
                    navLinks[i].parentElement.classList.add('active');
                } else {
                    navLinks[i].parentElement.classList.remove('active');
                }
            }
        }

        function toggleMenu() {
            const menu = document.querySelector('nav ul');
            menu.classList.toggle('show');
        }
    </script>
</body>
</html>
