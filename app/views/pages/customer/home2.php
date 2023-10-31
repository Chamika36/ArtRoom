<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-02</title>    
    <link rel="stylesheet" href="../../../../public/css/customer-navbar.css">
    <link rel="stylesheet" href="../../../../public/css/grid.css">
    <link rel="stylesheet" href="../../../../public/css/logo.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />

    <style>

      
      .background {
            background-image: url('<?php echo URLROOT ?>/images/customer-home2-bg.png');
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 100%;
            // opacity: 0.4;
            
       }

       #image_of_the_sun {
        background-image: url('<?php echo URLROOT ?>/images/customer-home02-sun-photo.png');
        width: 231px;
        height: 310px;
        flex-shrink: 0;
        border-radius: 32px;
        background: url('<?php echo URLROOT ?>/images/customer-home02-sun-photo.png'), lightgray 50% / cover no-repeat;
        position: absolute; 
        top: 36%;            
        left: 12%;           
      } 

      #about_us{
        width: 240px;
        height: 45px;
        flex-shrink: 0;
        color: #000;
        text-align: center;
        font-family: Istok Web;
        font-size: 40px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        letter-spacing: 1.6px;
        mix-blend-mode: darken;
        position: absolute; 
        top: 16%; 
        left: 30%; 
      }

      #description{
        display: flex;
        width: 920px;
        height: 250px;
        flex-direction: column;
        justify-content: center;
        flex-shrink: 0;
        color: #000;
        text-align: center;
        font-family: Acme;
        font-size: 28px;
        font-style: normal;
        font-weight: 400;
        line-height: 161.4%; /* 32.28px */
        letter-spacing: 0.8px;
        position: absolute; 
        top: 40%; 
        left: 30%; 
      }
      

    </style>

</head>
      
  <body class="background">
      <div id="header">
            <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
      </div>
      <!-- Your page content goes here -->
      
      <div id="image_of_the_sun"></div>
      <img src="<?php echo URLROOT ?>/images/logo.png" alt="Your Image" class="logo">

      <div id="about_us"><p><b>About Us</b></p></div>
      <div id="description"><p><b>Art Room studio is a professional wedding photography studio in Balangoda, Sri Lanka.  
We offer wedding photography, wedding videography, commercial photo shoots, personel portfolio shoots and etc.</br></br>

 If you like our work and feel you would like to meet and discuss your wedding, or if you have any questions you would like to ask, please contact me via the contact page and I will contact you shortly.</b></p></div>

  </body>
</html>
    
    

    