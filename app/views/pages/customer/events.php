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
    
        
        
        <div class="topic">
            <h1 class="requestQuote">All Events</h1>
        </div>
            <div class="container">
                
                <?php foreach($data['events'] as $event) : ?>
                    <div class="event-container">
                        <div class="date-div">
                            <h6>Event ID: <?php echo $event->EventID; ?></h6>
                            <h2>Date:</h2>
                            <h2><?php echo $event->EventDate; ?></h2>
                        </div>
                        <div class="location-div">
                            <h2>Colombo,Sri lanka</h3>
                            <h4>BRC Ground, Sri Sambuddhathva Jayanthi Mawatha, Havelock Town, Colombo, Colombo District, Western Province, 00006, Sri Lanka</h4>
                        </div>
                        <div class="status-div">
                            <h4>Request Status:</h4>
                            <h3><?php echo $event->Status; ?></h3>
                        </div>
                        <div class="btn-div">
                            <button onclick="window.location.href='<?php echo URLROOT ?>/events/viewEvent/<?php echo $event->EventID; ?>'" class="view-details-button">View Details</button>
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