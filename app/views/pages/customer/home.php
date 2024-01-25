<!--<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>    
    <link rel="stylesheet" href="<//?php echo URLROOT ?>/css/customer-navbar.css">
    <link rel="stylesheet" href="../../../../public/css/grid.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />

    <style>

        .background_pic{
        background-image: url('<//?php echo URLROOT ?>/images/customer-home-bg.png'); 
        background-size: cover;
        background-position: center; /* Center the background image */
        width: 100%;
        height: 325px; 
        margin: 0%;
        }

        img {
            width: 330px;
            height: 330px;
            transform: rotate(0.084deg);
            flex-shrink: 0;
           
            
            }

            .container {
            position: relative;
            width: 100%;
            height: 400px;
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
       //  Navbar
        

        <div id="header" class="background_pic">
            <//?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
        </div>

    </div>

     

    <div>
    <img class="responsive-image01" src="<//?php echo URLROOT ?>/images/customer-home-pic.svg">
    </div>

    <div>
    <img class="logo" src="<//?php echo URLROOT ?>/images/logo.png">
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
    <img class="cameraLogo" src="<//?php echo URLROOT ?>/images/cameraLogo.svg">
    </div>

    <div style="position: absolute; top: 90%;  left: 75%;">
        <a href="<//?php echo URLROOT ?>/home/aboutUs"> <p class="bottomText">About Us</p></a>
    </div>

    <div style="position: absolute; top: 90%;  left: 85%;">
        <a href="<//?php echo URLROOT ?>/home/services"><p class="bottomText">Our Services</p></a>
    </div> -->

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-navbar.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-mainPages.css">
    <title>Home</title>

        <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            overflow-x: hidden;
        }
        
        #container-main-01 {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            height: 100%;
            
            height: 100vh;
            
        }

        .container-01{
            display: flex;
            flex-direction: column;
            height: 80vh;
            justify-content: center;
            align-items: center;

        }

        .container-02{
            display: flex;
            flex-direction: row;
            gap:12px;
            align-items: center;
            justify-content: center;
        }

        .container-02{
            display: flex;
            flex-direction: row;
            gap:12px;
            
            justify-content: start;
        }

        .container-03 {
            overflow: hidden;
            white-space: nowrap;
            font-size: 25px;
            position: relative;
            font-family: "Poppins", sans-serif;
            color: #333; /* Text color */
            line-height: 1.2; /* Adjust line height for better readability */
            margin-left: 20px;
            margin-top: 10px;
            font-weight: bold; /* Make the font bold */
        }


        .container-03 div {
            margin-bottom: 5px; /* Space between lines */
        }

        .cursor {
            position: absolute;
            top: 0;
            right: 0;
            height: 100%;
            width: 2px; /* Initial width for cursor */
            background-color: #000; /* Cursor color */
            animation: blink 0.7s infinite;
        }

        @keyframes blink {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
        }

        .logo {
            width: 150px;
            height: 150px;
            
            
        }

        .topic {
            color: #2E2626;
            font-family: Otomanopee One;
            font-size: 60px;
            font-style: normal;
            font-weight: 400;
            line-height: 118.9%; /* 76.096px */
            letter-spacing: 2.56px;
            mix-blend-mode: darken;
            
            
        }
        
        #left-side-01 {
            flex: 1;
            padding: 20px;
            background-color: white; /* Adjust the color as needed */
        }
        
        #right-side-01 {
            flex: 1;
            
            
        }

        #right-side-01 img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-top-left-radius: 200px;
            border-bottom-left-radius: 200px;
            opacity: 1; /* Set opacity to 0 to make it completely transparent */
        }

        #left-side-02 {
            display: flex;
            flex-direction: column;
            flex: 1;
            margin-top: 60px;
            color: white;
            background-color: #242526; /* Adjust the color as needed */
            align-items: center;
            justify-content: center;
            line-height: 1.5;
            font-weight: bold;
        }

        .container-02-left{
            align-items: start;
            font-size: 45px;
            font-family: "Poppins", sans-serif;
            

        }

        #right-side-02 {
            display: flex;
            flex: 1;
            align-items: center;
            justify-content: center;
            background-image: url("<?php echo URLROOT ?>/images/home-container-02.jpg");
            background-color: rgba(255, 255, 255, 0.5); /* Adjust the alpha value (0.5 for 50% opacity) */
            background-blend-mode: overlay;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            
            
        }

        .buttons-container {
        width: 100%;
        height: 20vh;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        }

        button {
        background: white;
        border: solid 2px black;
        padding: .375em 1.125em;
        font-size: 1rem;
        border-radius: 5px;
        }

        .button-arounder {
        font-size: 2rem;
        background: #f9b234;
        color: hsl(190deg, 10%, 95%);
        border-radius: 5px;
        font-weight: bold;
        
        box-shadow: 0 0px 0px hsla(190deg, 15%, 5%, .2);
        transfrom: translateY(0);
        border-top-left-radius: 7px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 7px;
        
        --dur: .15s;
        --delay: .15s;
        --radius: 16px;
        
        transition:
            border-top-left-radius var(--dur) var(--delay) ease-out,
            border-top-right-radius var(--dur) calc(var(--delay) * 2) ease-out,
            border-bottom-right-radius var(--dur) calc(var(--delay) * 3) ease-out,
            border-bottom-left-radius var(--dur) calc(var(--delay) * 4) ease-out,
            box-shadow calc(var(--dur) * 4) ease-out,
            transform calc(var(--dur) * 4) ease-out,
            background calc(var(--dur) * 4) steps(4, jump-end);
        }

        .button-arounder:hover,
        .button-arounder:focus {
        box-shadow: 0 4px 8px hsla(190deg, 15%, 5%, .2);
        transform: translateY(-4px);
        background: #f9b234;
        color: #242526;
        border-top-left-radius: var(--radius);
        border-top-right-radius: var(--radius);
        border-bottom-left-radius: var(--radius);
        border-bottom-right-radius: var(--radius);
        }

        .gallery-topic{
            
            font-size: 36px;
            position: relative;
            font-family: "Poppins", sans-serif;
            color: #333; /* Text color */
            margin-left: 100px;
            margin-top: 80px;
            margin-bottom: 50px;
            font-weight: bold
            letter-spacing: 1px; /* Add letter spacing for a bit of separation */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2)
                }

        .ag-format-container {
            width: 1200px;
            margin: 0 auto;
        }

        .ag-courses_box {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        z-index: -1;
        padding: 50px 0;
        
        }

        .ag-courses_item {
        -ms-flex-preferred-size: calc(33.33333% - 30px);
        flex-basis: calc(33.33333% - 30px);
        margin: 0 15px 32px;
        overflow: hidden;
        border-radius: 28px;
        
        }

        .ag-courses-item_link {
        display: block;
        padding: 30px 20px;
        background-color: #242526;
        overflow: hidden;
        text-decoration: none;
        position: relative;
        }

        .ag-courses-item_link-01{
            background-image: url("<?php echo URLROOT ?>/images/wedding.jpeg");
            background-size: cover; /* Cover makes sure the image covers the entire container */
            background-position: center;
        }

        .ag-courses-item_link-02{
            background-image: url("<?php echo URLROOT ?>/images/pre-shoot.jpeg");
            background-size: cover; /* Cover makes sure the image covers the entire container */
            background-position: center;
        }

        .ag-courses-item_link-03{
            background-image: url("<?php echo URLROOT ?>/images/birthday.jpeg");
            background-size: cover; /* Cover makes sure the image covers the entire container */
            background-position: center;
        }

        .ag-courses-item_link-04{
            background-image: url("<?php echo URLROOT ?>/images/graduation.png");
            background-size: cover; /* Cover makes sure the image covers the entire container */
            background-position: center;
        }

        .ag-courses-item_link-05{
            background-image: url("<?php echo URLROOT ?>/images/other-events.jpeg");
            background-size: cover; /* Cover makes sure the image covers the entire container */
            background-position: center;
        }

        .ag-courses-item_link:hover,
        .ag-courses-item_link:hover .ag-courses-item_date {
        text-decoration: none;
        color: #FFF;
        }

        .ag-courses-item_link:hover .ag-courses-item_bg {
        -webkit-transform: scale(10);
        -ms-transform: scale(10);
        transform: scale(10);
        }

        .ag-courses-item_title {
        min-height: 87px;
        margin: 0 0 25px;

        overflow: hidden;

        font-weight: bold;
        font-size: 32px;
        color: #242526;
        text-decoration: none;

        z-index: 2;
        position: relative;
        -webkit-text-stroke: 0.5px white; /* Width and color of the border */
  
        }

        .ag-courses-item_date-box {
        font-size: 18px;
        color: #FFF;

        z-index: 2;
        position: relative;
        }

        .ag-courses-item_date {
        font-weight: bold;
        color: #f9b234;

        -webkit-transition: color .5s ease;
        -o-transition: color .5s ease;
        transition: color .5s ease
        }

        .ag-courses-item_bg {
        height: 128px;
        width: 128px;
        background-color: #f9b234;

        z-index: 1;
        position: absolute;
        top: -75px;
        right: -75px;

        border-radius: 50%;

        -webkit-transition: all .5s ease;
        -o-transition: all .5s ease;
        transition: all .5s ease;
        }

        .ag-courses_item:nth-child(2n) .ag-courses-item_bg {
        background-color: #f9b234;
        }
        .ag-courses_item:nth-child(3n) .ag-courses-item_bg {
        background-color: #f9b234;
        }
        .ag-courses_item:nth-child(4n) .ag-courses-item_bg {
        background-color: #f9b234;
        }
        .ag-courses_item:nth-child(5n) .ag-courses-item_bg {
        background-color: #f9b234;
        }
        .ag-courses_item:nth-child(6n) .ag-courses-item_bg {
        background-color: #f9b234;
        }



        @media only screen and (max-width: 979px) {
        .ag-courses_item {
            -ms-flex-preferred-size: calc(50% - 30px);
            flex-basis: calc(50% - 30px);
        }
        .ag-courses-item_title {
            font-size: 24px;
        }
        }

        @media only screen and (max-width: 767px) {
        .ag-format-container {
            width: 96%;
        }

        }
        @media only screen and (max-width: 639px) {
        .ag-courses_item {
            -ms-flex-preferred-size: 100%;
            flex-basis: 100%;
        }
        .ag-courses-item_title {
            min-height: 72px;
            line-height: 1;

            font-size: 24px;
        }
        .ag-courses-item_link {
            padding: 22px 40px;
        }
        .ag-courses-item_date-box {
            font-size: 16px;
        }
        }

        .packages-container {
            font-family: "Poppins", sans-serif;
            display: flex;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        
        .package {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            max-width: 100%;
            margin: 20px;
            overflow: hidden;
            width: 70%;
            
            
        }

        .package h6 {
            opacity: 0.6;
            margin: 0;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .package h2 {
            letter-spacing: 1px;
            margin: 10px 0;
        }
        
        .package-preview {
            background-color: #f9b234;
            color: #242526;
            padding: 40px;
            max-width: 250px;
            width: 25%;
        }

        .package-info {
            background-color: #242526;
            color: #ccc;
            padding: 30px;
            position: relative;
            width: 100%;
            z-index: 0;
        }
        
        .btn {
            background-color: #3b3d3e;
            border: 0;
            border-radius: 50px;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
            color: #fff;
            font-size: 16px;
            padding: 12px 25px;
            position: absolute;
            bottom: 30px;
            right: 30px;
            letter-spacing: 1px;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn:hover {
            background-color: #f9b234;
            color: #242526;
        }

        footer {
            background-color: #242526;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            
            margin-right: 50px;
        }

        .footer-info {
            /* Add margin between the "About" and "Contact Us" links */
            margin-right: 20px;
        }

        .footer-link {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
        }

        .footer-link:hover {
            text-decoration: underline;
        }


        </style>


    </head>

<body>

        <div class="container">
            <div id="header" class="background_pic">
                <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
            </div>

        </div>

        <div id="container-main-01">
            <div id="left-side-01">
                <!-- Content for the left side goes here -->
                <div class="container-01">
                    <div class=container-02>
                        <div>
                            <img class="logo" src="<?php echo URLROOT ?>/images/logo.png">
                        </div>
                        <div>
                            <p class="topic"><b>Art Room <br>Photography</b></p>
                        </div>
                    </div>
                    
                    <div class=container-03>
                        <div>Welcome to Art Room!</div>
                        <div>We are committed in providing you an</div>
                        <div>exceptional service that exceeds expectations. </div>
                        
                        <div class="cursor"></div> <!-- Cursor element -->
                    </div>
                </div>

                
            </div>

            <div id="right-side-01">
                <!-- Content for the right side goes here -->
                <img src="<?php echo URLROOT ?>/images/home-container-01.jpg" alt="Your Image Alt Text">
                
            </div>
        </div>
        <div id="container-main-01">
            <div id="left-side-02">
                <div class=container-02-left>
                Your Special Moments</br> Deserve to be</br> Celebrated in Style...
                </div>
                <a href="<?php echo URLROOT ?>/events/request">
                <div class="buttons-container">
                    <button class="button-arounder">Make a Request</button>
                </div>
                </a>
            </div>
            <div id="right-side-02">
                <div class=container-02-right>
                <div class="buttons-container">
                    
                </div>
                </div>
            </div>
        </div>

        <div class=gallery-topic>
            Gallery
        </div>

        <div class="ag-format-container">
        <div class="ag-courses_box">

        <div class="ag-courses_item">
            <a href="#" class="ag-courses-item_link ag-courses-item_link-01">
                <div class="ag-courses-item_bg"></div>

                <div class="ag-courses-item_title">
                Wedding Shoots
                </div>
            </a>
            </div>

            <div class="ag-courses_item">
            <a href="#" class="ag-courses-item_link ag-courses-item_link-02">
                <div class="ag-courses-item_bg">
                </div>
                <div class="ag-courses-item_title">
                Pre Shoots
                </div>
            </a>
            </div>

            <div class="ag-courses_item">
            <a href="#" class="ag-courses-item_link ag-courses-item_link-03">
                <div class="ag-courses-item_bg"></div>

                <div class="ag-courses-item_title">
                Birthday Shoots
                </div>

                
            </a>
            </div>
            <div class="ag-courses_item">
            <a href="#" class="ag-courses-item_link ag-courses-item_link-04">
                <div class="ag-courses-item_bg"></div>

                <div class="ag-courses-item_title">
                Graduation Shoots
                </div>

                
            </a>
            </div>

            <div class="ag-courses_item">
            <a href="#" class="ag-courses-item_link ag-courses-item_link-05">
                <div class="ag-courses-item_bg"></div>

                <div class="ag-courses-item_title">
                Other Events
                </div>

                
            </a>
            </div>

        </div>
        </div>

        <div class=gallery-topic>
            Packages
        </div>
        <div class="packages-container">
            <?php foreach ($data['packages'] as $package) : ?>
            <div class="package">
                <div class="package-preview">
                    <h6>Package</h6>
                    <h2><?php echo $package->Name ?></h2>
                </div>
                <div class="package-info">
                    <h3><?php echo $package->ServicesIncluded; ?></h3>
                    <h3>Rs. <?php echo $package->Price; ?></h3>
                    <button class="btn">Select Package</button>
                </div>
            </div>
            <?php endforeach; ?>

            <!-- <div class="package">
                <div class="package-preview">
                    <h6>Package</h6>
                    <h2>Wedding</h2>
                </div>
                <div class="package-info">
                    <h3>Full-day wedding photography package ceremony coverage, Reception coverage, 300 edited photos, Online gallery</h3>
                    <h3>Rs.199,990.00</h3>
                    <button class="btn">Select Package</button>
                </div>
            </div>
            <div class="package">
                <div class="package-preview">
                    <h6>Package</h6>
                    <h2>Portrait</h2>
                </div>
                <div class="package-info">
                    <h3>Portrait photography session 1-hour session, 10 edited photos, Studio or outdoor location</h3>
                    <h3>Rs.9,990.00</h3>
                    <button class="btn">Select Package</button>
                </div>
            </div>
            <div class="package">
                <div class="package-preview">
                    <h6>Package</h6>
                    <h2>Event</h2>
                </div>
                <div class="package-info">
                    <h3>Event photography coverage 4-hour coverage, Unlimited photos, Candid shots</h3>
                    <h3>Rs.99,990.00</h3>
                    <button class="btn">Select Package</button>
                </div>
            </div>
            <div class="package">
                <div class="package-preview">
                    <h6>Package</h6>
                    <h2>Travel</h2>
                    
                </div>
                <div class="package-info">
                    <h3>Travel photography adventure 3-day adventure, 100 edited photos, Customized itinerary</h3>
                    <h3>Rs.399,990.00</h3>
                    <button class="btn">Select Package</button>
                </div>
            </div> -->

        </div>

        <footer>
        <div class="footer-content">
            <div class="footer-links">
                <!-- Additional links can be added here if needed -->
            </div>
            <div class="footer-info">
                <a href="#" class="footer-link">About</a>
                <a href="#" class="footer-link">Contact Us</a>
            </div>
        </div>
        </footer>

    <script>
        // JavaScript code for the typing effect
        document.addEventListener('DOMContentLoaded', function () {
            const textContainer = document.querySelector('.container-03');
            const textLines = textContainer.querySelectorAll('div');
            const cursor = document.querySelector('.cursor');
            textContainer.innerHTML = ''; // Clear the original text

            let lineIndex = 0;
            let charIndex = 0;

            function typeWriter() {
                if (lineIndex < textLines.length) {
                    const currentLine = textLines[lineIndex].textContent;
                    if (charIndex < currentLine.length) {
                        textContainer.innerHTML += currentLine.charAt(charIndex);
                        charIndex++;
                        setTimeout(typeWriter, 50); // Adjust the typing speed (milliseconds)
                    } else {
                        charIndex = 0;
                        lineIndex++;
                        textContainer.innerHTML += '<br>';
                        setTimeout(typeWriter, 300); // Adjust the delay between lines (milliseconds)
                    }
                } else {
                    // Typing animation is complete, hide the cursor
                    cursor.style.width = '0';
                }
            }

            typeWriter();
        });
    </script>
</body>

</html>
