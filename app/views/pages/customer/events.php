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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />

    <style>
        
       .bottom-column {
            flex: 4;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .event {
            margin: 20px 0;
            padding: 10px;
            background-color: #f5f5f5;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .event-details {
            flex: 1;
        }

        .view-details-button {
            background-color: #504334;
            color: #fff;
            padding: 5px 10px;
            border: none;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.2s;
        }

        .view-details-button:hover {
            background-color: #774001;
        }

    </style>
</head>
<body>
    <div>
    <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
    </div>
    <div class="container">
        <div class="bottom-row">
        <div class="left-area">
            <div style="text-align: center;"><img src="<?php echo URLROOT ?>/images/logo.png" alt="Your Image" class="logo"></div>
            <div class="x">
                <div class="button">User Profile</div>
                <div class="button">Request Quote</div>
                <div class="button">Event Upgrade</div>
                <div class="button">My Events</div>
                <div class="button">Log Out</div>
            </div>
        </div>

            <div class="bottom-column">
                <h2 class="requestQuote">All Events</h2>
                <div class="event">
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
                </div>
            </div>
        </div>
    </div>
</body>
</html>
