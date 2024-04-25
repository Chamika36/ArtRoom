
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-navbar.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-mainPages.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/notification.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Home</title>

        <style>
        
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
                    <a href="<?php echo URLROOT ?>/events/request/0">
                <div class="reqButton">
                    <button class="button-arounder">Make a Request</button>
                </div>
                </a>
                </div>

                
            </div>

            <div id="right-side-01">
                <!-- Notification Icon -->
                <?php if(isset($_SESSION['user_id'])) : ?>
                <div class="notification-wrapper">
                    <div class="notification-icon">
                        <i class='bx bxs-bell'></i>
                        <span class="num"><b><?php echo $data['unreadNotificationCount']; ?></b></span>
                    </div>
                    <!-- Dropdown for notifications -->
                    <ul class="dropdown-menu">
                        <li><b>Notifications</b></li>
                        <?php foreach($data['notifications'] as $notification) : ?>
                            <?php //if($notification->Type ===  'action' || $notification->Type === 'request' || $notification->Type === 'payment' || $notification->Type === 'reschedule') : ?>
                            <?php if($notification->Type === 'file') : ?>
                                <li>
                                    <a href="<?php echo $notification->Link; ?>" data-notification-id="<?php echo $notification->NotificationID; ?>"><?php echo $notification->Content?></a>
                                </li>
                            <?php else : ?>
                                <li>
                                    <a href="<?php echo URLROOT ?>/<?php echo $notification->Link; ?>" data-notification-id="<?php echo $notification->NotificationID; ?>"><?php echo $notification->Content?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <!-- Content for the right side goes here -->
                <img src="<?php echo URLROOT ?>/images/home-container-01.jpg" alt="Your Image Alt Text">
                
            </div>
        </div>

        <section>
            <div class=gallery-topic id="Gallery">
                <p style="color: white"><i class="fa-regular fa-images"></i> Our Gallery</p>
            </div>



            <div class="gallery-container">
            
            <?php foreach ($data['samples'] as $sample) : ?>
                <a href="<?php echo URLROOT ?>/samples/viewSample/<?php echo $sample->SampleID; ?>">
                    <div class="item-container">
                        <div class="img-container">
                            <!-- Placeholder for the cover image of the sample -->
                            <img src="<?php echo URLROOT ?>/<?php echo $sample->CoverImagePath; ?>" alt="Cover Image">
                        </div>

                        <div class="body-container">
                            <div class="overlay"></div>

                            <div class="event-info">
                                <p class="title"><?php echo $sample->SampleName; ?></p>
                                <div class="separator"></div>
                                <p class="info"><b>ArtRoom Photography</b></p>

                                <div class="additional-info">
                                    <!-- <p class="info">
                                        <i class="fas fa-map-marker-alt"></i><?php echo $sample->Description; ?>
                                    </p> -->
                                    <p class="info description">
                                        <?php echo $sample->Date; ?>
                                    </p>
                                    <button class="view-sample-btn" onclick="window.location.href='<?php echo URLROOT ?>/samples/viewSample/<?php echo $sample->SampleID; ?>'">View Album</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        

            </div>


            </section>

        <div class=gallery-topic id="Packages">
            <p><i class="fa-solid fa-rectangle-list"></i> Our Packages</p>
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
                <p style="color: white"><i class="fa-regular fa-handshake"></i> Our Happy Customers</p>
            </div>
            
            <div class="test">
                <?php foreach ($data['feedbacks'] as $feedback) : ?>
                    <figure class="snip1533">
                        <figcaption>
                            <blockquote>
                            <p>"<?php echo $feedback->Comment ?>"</p>
                            </blockquote>
                            <h3><?php echo $feedback->Name?></h3>

                            <?php
                                // Assuming $feedback is your object with a Rating property
                                $rating = $feedback->Rating;

                                // Define the star HTML to display a full star
                                $fullStar = '<i class="fa-solid fa-star" style="color: #f9b234;"></i>';

                                // Start the output
                                $output = '';

                                // Loop to generate stars
                                for ($i = 0; $i < $rating; $i++) {
                                    $output .= $fullStar; // Append a star for each rating point
                                }

                                // Display the stars
                                ?>
                                <h4><?php echo $output; ?></h4>

                            <!-- <h4><i class="fa-solid fa-star" style="color: #f9b234;"></i> <?php echo $feedback->Rating?></h4> -->

                        </figcaption>
                    </figure>
                <?php endforeach; ?>
            </div>
            <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-solid fa-angle-up"></i></button>

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

        <script>
            var URLRoot=<?php echo json_encode(URLROOT);?>;
        </script>
        <script src="<?php echo URLROOT ?>/js/notifications.js"></script>
</body>

</html>

