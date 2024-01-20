<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-03</title>    
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-navbar.css">
    <link rel="stylesheet" href="../../../../public/css/grid.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/logo.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />

    <style>

        .background{
            width: 100%;
            height: 61px;
            flex-shrink: 0;
            //opacity: 0.7;
            background: #94794F;
            
        }

        #our_services{
            width: 235px;
            height: 48px;
            flex-shrink: 0;
            color: #000;
            text-align: center;
            font-family: Istok Web;
            font-size: 35px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            letter-spacing: 1.6px;
            mix-blend-mode: darken;
            position: absolute;
            top: 24%;
            left:22% ;
        }

        .background_rectangle{
            width: 280px;
            height: 380px;
            flex-shrink: 0;
            border-radius: 30px;
            position: absolute;
            top: 36%;

        }

        .images{
            width: 133px;
            height: 120px;
            flex-shrink: 0;
            border-radius: 133px;
            background: url(<path-to-image>), lightgray 50% / cover no-repeat;
            position: absolute;
            top: 40%;
        }

        .service_topics{
            display: flex;
            width: 220px;
            height: 19px;
            flex-direction: column;
            justify-content: center;
            flex-shrink: 0;
            color: #000;
            text-align: center;
            font-family: Acme;
            font-size: 22px;
            font-style: normal;
            font-weight: 400;
            line-height: 161.4%; /* 32.28px */
            letter-spacing: 0.8px;
            position: absolute;
            top: 56%;
        }

        .services_content{
            display: flex;
            width: 195px;
            height: 124px;
            flex-direction: column;
            justify-content: center;
            flex-shrink: 0;
            color: #4C2E2E;
            text-align: center;
            font-family: Acme;
            font-size: 15px;
            font-style: normal;
            font-weight: 400;
            line-height: 161.4%; /* 24.21px */
            letter-spacing: 0.6px;
            position: absolute;
            top: 63%;
        }

    </style>  
    
</head>
      
  <body>

    <div class="background">
    <div id="header">
            <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
      </div>
    </div>

    <img src="<?php echo URLROOT ?>/images/logo.png" alt="Image" class="logo" style="position: absolute; top: 15%; left: 90%; height: 85px; width: 85px">
    
    <div id="our_services">Our Services</div>
    
    <div class="background_rectangle" style="background: rgba(193, 172, 162, 0.50); left: 20%" ></div>

    <div class="background_rectangle" style="background: rgba(219, 178, 140, 0.50); left: 42%" ></div>

    <div class="background_rectangle" style="background: rgba(229, 167, 153, 0.50); left: 64%" ></div>

    <img src="<?php echo URLROOT ?>/images/cus-home3-weddings.png" alt="Image" class="images" style="left: 24.5%">

    <img src="<?php echo URLROOT ?>/images/cus-home3-preShoot.png" alt="Image" class="images" style="left: 46.8%">

    <img src="<?php echo URLROOT ?>/images/cus-home3-eventPhotoshoot.png" alt="Image" class="images" style="left: 68.8%">

    <p class="service_topics" style="left: 21.8%"><b>Weddings</b><p>
    <p class="service_topics" style="left: 44%"><b>Pre Shoot</b><p>
    <p class="service_topics" style="left: 66%"><b>Event Photoshoot</b><p>
        
    <p class="services_content" style="left: 23%"><b>Wedding photography is much more than simply snapping a few pictures. It is a one kind of art. Just tell us what you need and we will fullfill that..</b><p>
    <p class="services_content" style="left: 45%"><b>Pre-shoot is to get used to being in front of the camera, build rapport with us, and receive a lovely set of romantic photographs well before your wedding.</b><p>  
    <p class="services_content" style="left: 67%"><b>Event photography is the professional art of snapping high-quality images during a wide variety of important occasions.</b><p>
  </body>
</html>