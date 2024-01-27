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
        <div class="bottom-container">
            <div class="row" style="flex: 1; align-items: flex-start;">
                <div class="column">
                    <div>View Requests</div>
                    <div class="event-square">Event ID: <?php echo $data['event']->EventID; ?></div>
                </div>
                <div class="column">
                    <div class="details">
                    <ul>
                        <li><strong>Event Name:</strong> <?php echo $data['package']->Name; ?></li>
                        <li><strong>Date:</strong> <?php echo $data['event']->EventDate; ?></li>
                        <li><strong>Location:</strong> <?php echo $data['event']->Location; ?></li>
                        <li><strong>Status:</strong> <?php echo $data['event']->Status; ?></li>
                        <li><strong>Additional Requests:</strong> <?php echo $data['event']->AdditionalRequests; ?></li>
                    </ul>
                    </div>
                </div>
                <div class="column">
                    <div class="buttons">
                        <button class="button">Accept</button>
                        <button class="button decline">Decline</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
