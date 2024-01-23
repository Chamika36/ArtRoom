<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/usercard.css">
</head>
<body>
    <!-- <div class="container"> -->
        <!-- <div id="menu"> -->
            <!-- Sidebar -->
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        <!-- </div> -->

    <div class="home">
        <div class="card__container">
            <article class="card__article">
               <img src="https://img.grouponcdn.com/iam/nd6zqNhs1PAbWxotqFii/mQ-2290x1526/v1/c870x524.jpg" alt="image" class="card__img">

               <div class="card__data">
                  <h2 class="card__title">Customer</h2>
                  <a href="<?php echo URLROOT; ?>/users/getcustomers" class="card__button">Details</a>
               </div>
            </article>

            <article class="card__article">
               <img src="https://quickphotodubai.com/wp-content/uploads/2021/11/Best-professional-photographers-in-Dubai2.jpg" alt="image" class="card__img">

               <div class="card__data">
                  <h2 class="card__title">Photgrapher</h2>
                  <a href="<?php echo URLROOT; ?>/users/getPhotographers" class="card__button">Details</a>
               </div>
            </article>

            <article class="card__article">
               <img src="https://www.sjphoto.com/printing-workshop/_MG_0008.jpg" alt="image" class="card__img">

               <div class="card__data">
                  <h2 class="card__title">Editors</h2>
                  <a href="<?php echo URLROOT; ?>/users/getPrintingfirms" class="card__button">Details</a>
               </div>
            </article>

            <article class="card__article">
               <img src="https://media.wired.com/photos/60dcea818a1e88a03ed5ce04/master/pass/Gear-Beef-Up-Video-Editing-PC-1124258613.jpg" alt="image" class="card__img">

               <div class="card__data">
                  <h2 class="card__title">Printing Firms</h2>
                  <a href="<?php echo URLROOT; ?>/users/getEditors" class="card__button">Details</a>
               </div>
            </article>

            </div>
      </div>
   </body>
</html>
