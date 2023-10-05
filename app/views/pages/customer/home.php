<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>    
    <link rel="stylesheet" href="../../../../public/css/customer-navbar.css">
    <link rel="stylesheet" href="../../../../public/css/grid.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />

    <style>
        img {
            width: 330px;
            height: 330px;
            transform: rotate(0.084deg);
            flex-shrink: 0;
            border-radius: 249.016px;
            
            }

        .responsive-image01 {
            max-width: 100%;
            height: auto;
            display: block;
            position: absolute; /* Set the image position to absolute */
            top: 50%;            /* Move the image down by 50% of the viewport height */
            left: 80%;           /* Move the image to the right by 50% of the viewport width */
            transform: translate(-50%, -50%); /* Center the image horizontally and vertically */
        }

        img.logo {
            width: 150px;
            height: 150px;
            flex-shrink: 0;
            max-width: 100%;
            height: auto;
            display: block;
            position: absolute; /* Set the image position to absolute */
            top: 30%;            /* Move the image down by 50% of the viewport height */
            left: 12%;           /* Move the image to the right by 50% of the viewport width */
            transform: translate(-50%, -50%); /* Center the image horizontally and vertically */
        }

        .topic {
            color: #2E2626;
            font-family: Otomanopee One;
            font-size: 72px;
            font-style: normal;
            font-weight: 400;
            line-height: 118.9%; /* 76.096px */
            letter-spacing: 2.56px;
            mix-blend-mode: darken;
            position: absolute; /* Set the image position to absolute */
            top: 20%;            /* Move the image down by 50% of the viewport height */
            left: 32%;           /* Move the image to the right by 50% of the viewport width */
            transform: translate(-50%, -50%);
        }

        @media (max-width: 768px) {
        .topic {
        font-size: 48px; /* Adjust font size for smaller screens */
        top: 10%; /* Move the text down for smaller screens */
        left: 50%; /* Center horizontally for smaller screens */
        transform: translateX(-50%);
    }
}

        .welcome{
            display: flex;
            width: 198px;
            height: 42px;
            flex-direction: column;
            justify-content: center;
            flex-shrink: 0;
            color: #482B2B;
            font-family: Abril Fatface;
            font-size: 50px;
            font-style: normal;
            font-weight: 400;
            line-height: 118.9%; /* 42.804px */
            letter-spacing: 1.44px;
            position: absolute; 
            top: 60%;            /* Move the image down by 50% of the viewport height */
            left: 50%;           /* Move the image to the right by 50% of the viewport width */
            transform: translate(-50%, -50%);
        }
        .welcomeText{
            display: flex;
            width: 695px;
            height: 69px;
            flex-direction: column;
            justify-content: center;
            flex-shrink: 0;
            color: #5E4646;
            text-align: center;
            text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            font-family: Abhaya Libre Medium;
            font-size: 25px;
            font-style: normal;
            font-weight: 500;
            line-height: 125.9%; /* 28.957px */
            letter-spacing: 0.92px;
            position: absolute; /* Set the image position to absolute */
            top: 72%;            /* Move the image down by 50% of the viewport height */
            left: 50%;           /* Move the image to the right by 50% of the viewport width */
            transform: translate(-50%, -50%);
        }

        img.cameraLogo {
            width: 40px;
            height: 40px;
            flex-shrink: 0;
            max-width: 100%;
            height: auto;
            display: block;
            position: absolute; /* Set the image position to absolute */
            top: 67%;            /* Move the image down by 50% of the viewport height */
            left: 12%;           /* Move the image to the right by 50% of the viewport width */
            transform: translate(-50%, -50%); /* Center the image horizontally and vertically */
        }

        .bottomText{
            width: 140px;
            height: 20px;
            flex-shrink: 0;
            color: #000;
            text-align: center;
            font-family: Istok Web;
            font-size: 22px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
            letter-spacing: 0.8px;
            text-decoration-line: underline;
        }
        
    </style>

</head>

<body style="background-color:#E1DBCC;">

    <div class="container">
        <!-- Navbar -->
        <div class="item1">
            <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
        </div>
        
    </div>
    <div>
    <img class="responsive-image01" src="<?php echo URLROOT ?>/images/customer-home-pic.svg">
    </div>

    <div>
    <img class="logo" src="<?php echo URLROOT ?>/images/logo.svg">
    </div>

    <div>
        <p class="topic"><b>Art Room <br>Photography</b></p>

    </div>

    <div>
        <p class="welcome"><b>Welcome!</b></p>

    </div>

    <div>
        <p class="welcomeText">We are committed to providing you an exceptional services that<br> exceed expectations.</p>

    </div>

    <div>
    <img class="cameraLogo" src="<?php echo URLROOT ?>/images/cameraLogo.svg">
    </div>

    <div style="position: absolute; top: 90%;  left: 75%;">
        <p class="bottomText">About Us</p>
    </div>

    <div style="position: absolute; top: 90%;  left: 85%;">
        <p class="bottomText">Our Services</p>
    </div>

</body>
</html>    