<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>events</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-navbar.css">
    <link rel="stylesheet" href="../../../../public/css/grid.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/logo.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-mainPages.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-events.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />

    
</head>
<body>
    <div>
        <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
    </div>
    
        
        <div>
            <?php //include(APPROOT . '/views/pages/customer/sidebar/sidebar.php'); ?>
            <P>sidebar</P>
        </div>

            <div class="container">
                <h2 class="requestQuote">All Events</h2>
                <?php foreach($data['events'] as $event) : ?>
                    <div class="event-container">
                        <div>
                            <p>Event ID: <?php echo $event->EventID; ?></p>
                            <p>Date: <?php echo $event->EventDate; ?></p>
                        </div>
                        <div>
                            <p>Location:</p>
                        </div>
                        <div>
                            <p>Status: <?php echo $event->Status; ?></p>
                        </div>
                        <div>
                            <a href="<?php echo URLROOT ?>/events/viewEvent/<?php echo $event->EventID; ?>" class="view-details-button">View Details</a>
                        </div>
                    </div>
            
                <?php endforeach; ?>
            </div>
                <!-- <div class="event">
                    <div class="event-details">
                        <p>Date: October 15, 2023</p>
                        <p>Status: Upcoming</p>
                    </div>
                    <a href="event_details.php" class="view-details-button">View Details</a>
                </div>
                <div class="event">
                    <div class="event-details">
                        <p>Date: November 5, 2023</p>
                        <p>Status: Completed</p>
                    </div>
                    <a href="event_details.php" class="view-details-button">View Details</a>
                </div>
                <div class="event">
                    <div class="event-details">
                        <p>Date: December 20, 2023</p>
                        <p>Status: Scheduled</p>
                    </div>
                    <a href="event_details.php" class="view-details-button">View Details</a>
                </div> -->
            
</body>
</html>