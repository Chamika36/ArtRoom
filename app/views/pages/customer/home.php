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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            height: 100%;
            width: 80%;
            margin-left: 10%;
            /* border: 1px solid black; */

        }

        .container-02{
            display: flex;
            flex-direction: row;
            gap:12px;
            align-items: center;
            justify-content: center;
            /* border: 1px solid black; */
            margin-top: 25%;
            height: 30%;
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
            /* margin-top: 10px; */
            font-weight: bold; /* Make the font bold */
            /* border: 1px solid black; */
        }


        .container-03 div {
            margin-bottom: 5px; /* Space between lines */
        }

        .reqButton{
            display: flex;
            align-items: center;
            justify-content: left;
            margin-top: 20px;
            margin-left: 20px;

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

        section{
            border: 1px solid black;
            background: #242526;
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

        /* .buttons-container {
        width: 100%;
        height: 20vh;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        } */

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
        color: #242526;
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
        background: #242526;
        color: white;
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
        
        
        justify-content: center;
        
        }

        .ag-courses_item {
        -ms-flex-preferred-size: calc(33.33333% - 30px);
        flex-basis: calc(33.33333% - 30px);
        margin: 0 15px 32px;
        overflow: hidden;
        border-radius: 28px;
        box-shadow: 5px 5px 5px rgba(255, 255, 255, 1.0);

        
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
        font-size: 34px;
        color: white;
        text-decoration: none;

        z-index: 2;
        position: relative;
        -webkit-text-stroke: 1.5px black; /* Width and color of the border */
  
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
            background-color: #f9b234;
            color: #242526;
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
            color: black;
            margin: 0 10px;
            text-decoration: none;
        }

        .footer-link:hover {
            text-decoration: underline;
        }

        @import url(https://fonts.googleapis.com/css?family=Roboto:300,400);
        @import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css);
        .snip1533 {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
            color: #9e9e9e;
            display: inline-block;
            font-family: 'Roboto', Arial, sans-serif;
            font-size: 18px;
            margin: 35px 10px 10px;
            max-width: 310px;
            min-width: 280px;
            position: relative;
            text-align: center;
            width: 100%;
            background-color: #ffffff;
            border-radius: 5px;
            border-top: 5px solid #f9b234;
            margin-top: 50px;
            margin-bottom: 50px;
        
        }

        

        .test{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 50px auto;
            /* border: 1px solid white; */
            width: 80%;
            height: 100%;
            margin-top: 70px;
            margin-bottom: 80px;

        }

        .snip1533 *,
        .snip1533 *:before {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: all 0.1s ease-out;
        transition: all 0.1s ease-out;
        }

        .snip1533 figcaption {
        padding: 13% 10% 12%;
        }

        .snip1533 figcaption:before {
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            background-color: #fff;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.25);
            color: #d2652d;
            font-family: 'FontAwesome';
            content: "\f10e";
            
            font-size: 32px;
            font-style: normal;
            left: 50%;
            line-height: 60px;
            position: absolute;
            top: -30px;
            width: 60px;
        }

        .snip1533 h3 {
            color: #3c3c3c;
            font-size: 20px;
            font-weight: 300;
            line-height: 24px;
            margin: 10px 0 5px;
        }

        .snip1533 h4 {
            font-weight: 400;
            margin: 0;
            opacity: 0.5;
        }

        .snip1533 blockquote {
            font-style: italic;
            font-weight: 300;
            margin: 0 0 20px;
        }


        /* Demo purposes only */
        #myBtn {
            display: none;
            position: fixed;
            bottom: 70px;
            right: 20px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #3b3d3e;
            color: white;
            cursor: pointer;
            padding: 10px;
            border-radius: 10px;
            height: 40px;
            width: 40px;
            }

        #myBtn:hover {
            background-color: #f9b234;
            color: black;
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
                        <p>Welcome to Art Room!</br>We are committed in providing you an</br>exceptional service that exceeds expectations.</p>
                           
                        
                        
                         <!-- Cursor element -->
                    </div>
                    <a href="<?php echo URLROOT ?>/events/request">
                <div class="reqButton">
                    <button class="button-arounder">Make a Request</button>
                </div>
                </a>
                </div>

                
            </div>

            <div id="right-side-01">
                <!-- Content for the right side goes here -->
                <img src="<?php echo URLROOT ?>/images/home-container-01.jpg" alt="Your Image Alt Text">
                
            </div>
        </div>

        <section>
            <div class=gallery-topic id="Gallery">
                <p style="color: white">Our Gallery</p>
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
            </section>

        <div class=gallery-topic id="Packages">
            Our Packages
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
                    <a href="<?php echo URLROOT ?>/events/request/<?php echo $package->PackageID ?>"><button class="btn">Select Package</button></a>
                </div>
            </div>
            <?php endforeach; ?>

 

        </div>

        <section>
            <div class=gallery-topic id="Gallery">
                <p style="color: white">Our Happy Customers</p>
            </div>
            <div class="test">
            <figure class="snip1533">
                <figcaption>
                    <blockquote>
                    <p>"You captured our wedding so beautifully.. Thank You Art Room and the team."</p>
                    </blockquote>
                    <h3>Chamika karunarathne</h3>
                    <h4>Sports person</h4>
                </figcaption>
            </figure>
            <figure class="snip1533">
                <figcaption>
                    <blockquote>
                    <p>"We had some family photos taken at Art Room and was simply thrilled with the result. Thank you soo much"
                    </p>
                    </blockquote>
                    <h3>Probodini Senevirathne</h3>
                    <h4>Happy Customer</h4>
                </figcaption>
            </figure>
            <figure class="snip1533">
                <figcaption>
                    <blockquote>
                    <p>"Any occation. Any location. best ever photography service. Highly recommended"</p>
                    </blockquote>
                    <h3>Amal Perera</h3>
                    <h4>Singer</h4>
                </figcaption>
            </figure>
        </div>
            <button onclick="topFunction()" id="myBtn" title="Go to top"><b>&#8593;</b></button>

        </section>

        <footer>
        <div class="footer-content">
            <div class="footer-links">
                <a href="#" class="footer-link"><b>@2024 Art Room | All Rights Reserved</b></a>
            </div>
            <div class="footer-info">
                <a href="#" class="footer-link"><b>About</b></a>
                <a href="#" class="footer-link"><b>Contact Us</b></a>
            </div>
        </div>
        </footer>

  
    <script>
        

        // Get the button
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }
        </script>
</body>

</html>
