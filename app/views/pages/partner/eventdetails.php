<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>\css\partner\event-details.css">
    <title>Home</title>
</head>
<body>

    <?php include(APPROOT . '/views/include/partner-sidebar.php'); ?>
    
    <div class="home">
        <div class="blur"></div>

        <div class="transparent-box">
            <h2>Event Details</h2>
            <ul>
                <li><strong>Event Name:</strong> <?php echo $data['package']->Name; ?></li>
                <li><strong>Date:</strong> <?php echo $data['event']->EventDate; ?></li>
                <li><strong>Location:</strong> <?php echo $data['event']->Location; ?></li>
                <li><strong>Status:</strong> <?php echo $data['event']->Status; ?></li>
                <li><strong>Additional Requests:</strong> <?php echo $data['event']->AdditionalRequests; ?></li>
            </ul>
            
            <div class="button-container">
                <button class="button">Accept</button>
                <button class="button">Decline</button>
            </div>
        </div>
    </div>
</body>
</html>

