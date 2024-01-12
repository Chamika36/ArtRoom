<?php

// if (!isset($_SESSION['user_type_id']) || ($_SESSION['user_type_id'] !== 2 && $_SESSION['user_type_id'] !== 6)) {
//     header('Location: ' . URLROOT . '/home/error');
//     exit(); // Stop further execution
// }
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sidebar Menu</title>
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap'>
  <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/sidebar.css">
  <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/manager-styles.css">

</head>
<body>
<nav class="sidebar">
  <header>
    <div class="image-text">
      <span class="image">
        <img src="<?php echo URLROOT ?>/public/images/logo.png" alt="">
      </span>

      <div class="text logo-text">
        <span class="name"><h1>Art Room </h1></span>
      </div>
    </div>

    <i class='bx bx-chevron-right toggle'></i>
  </header>


  <div class="menu-bar">
    <div class="menu">

      <li class="search-box">
        <i class='bx bx-search icon'></i>
        <input type="text" placeholder="Search...">
      </li>

      <ul class="menu-links">
        <li class="nav-link">
          <a href="<?php echo URLROOT ?>/home/partner">
            <i class='bx bx-home-alt icon'></i>
            <span class="text nav-text">Dashboard</span>
          </a>
        </li>

        <li class="nav-link">
          <a href="<?php echo URLROOT ?>/partners/viewPartnerEvents/<?php echo $_SESSION['user_id']?>">
            <i class='bx bx-calendar-event icon'></i>
            <span class="text nav-text">Events</span>
          </a>
        </li>


        <li class="nav-link">
          <a href="<?php echo URLROOT ?>/partners/samples">
            <i class='bx bx-photo-album icon'></i>
            <span class="text nav-text">Gallery</span>
          </a>
        </li>

        <li class="nav-link">
          <a href="<?php echo URLROOT ?>/partners/profile/<?php echo $_SESSION['user_id']?>">
            <i class='bx bxs-user-detail icon'></i>
            <span class="text nav-text">Profile</span>
          </a>
        </li>

        <!-- <li class="nav-link">
          <a href="#">
            <i class='bx bx-wallet icon'></i>
            <span class="text nav-text">Wallets</span>
          </a>
        </li> -->

      </ul>
    </div>

    <div class="bottom-content">
      <!-- <li class="">
        <a href="#">
          <i class='bx bx-log-out icon'></i>
          <span class="text nav-text">Logout</span>
        </a>
      </li> -->

      <?php
        if (isset($_SESSION['user_id'])) {
            // User is logged in
            echo '<li class=""><i class="bx bx-log-out icon"></i><a href="'. URLROOT .'/users/logout"><span class="text nav-text">Logout</span></a></li>';
        } else {
            // User is not logged in
            echo '<li class=""><i class="bx bx-log-in icon"><a href="'. URLROOT .'/users/login"></i><span class="text nav-text">Login</span></a></li>';
            // echo '<li class="right"><a href="'. URLROOT .'/users/login">Log In</a></li>';
        }
      ?>    

<!-- 
      <li class="mode">
        <div class="sun-moon">
          <i class='bx bx-moon icon moon'></i>
          <i class='bx bx-sun icon sun'></i>
        </div>
        <span class="mode-text text">Dark mode</span>

        <div class="toggle-switch">
          <span class="switch"></span>
        </div>
      </li> -->

    </div>
  </div>

</nav>

<script src="<?php echo URLROOT ?>/js/manager/sidebar.js"></script>

</body>
</html>
