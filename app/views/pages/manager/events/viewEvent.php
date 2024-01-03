<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Event</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/manageevent.css">
</head>
<body>
    <div class="container2">
        <h2>Manage Event</h2>
        <div class="event-details">
            <h3>Event Details</h3>
            <ul>
                <li><strong>Event Name:</strong> <?php echo $data['package']->Name; ?></li>
                <li><strong>Event Id:</strong> <?php echo $data['event']->EventID; ?></li>
                <li><strong>Date:</strong> <?php echo $data['event']->EventDate; ?></li>
                <li><strong>Location:</strong> <?php echo $data['event']->Location; ?></li>
                <li><strong>Status:</strong> <?php echo $data['event']->Status; ?></li>
                <li><strong>Additional Requests:</strong> <?php echo $data['event']->AdditionalRequests; ?></li>
                <li><strong>Requsted Photographer:</strong> <?php echo $data['requestedPhotographer']->FirstName . ' ' . $data['requestedPhotographer']->LastName; ?></li>
                <li><strong>Assigned Photographer:</strong> <?php echo $data['photographer']->FirstName . ' ' . $data['photographer']->LastName; ?> <Strong>Status : </Strong><?php echo $data['photographerAction']->Action; ?></li> 
                <li><strong>Assigned Editor:</strong> <?php echo $data['editor']->FirstName . ' ' . $data['editor']->LastName; ?> <Strong>Status : </Strong><?php echo $data['editorAction']->Action; ?></li>
                <li><strong>Assigned Printing Firm:</strong> <?php echo $data['printingFirm']->FirstName . ' ' . $data['printingFirm']->LastName; ?> <Strong>Status : </Strong><?php echo $data['printingFirmAction']->Action; ?></li>
            </ul>
        </div>
    </div>
</body>