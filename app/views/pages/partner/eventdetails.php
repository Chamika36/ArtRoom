<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>\css\partner\event-details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                <li><strong>Location:</strong> <?php echo $data['event']->Location; ?> <button id="viewLocationButton" class="map-button"><i class="fas fa-map-marker-alt"></i> View on Map</button></li>
                <li><strong>Start Time:</strong> <?php echo $data['event']->StartTime; ?></li>
                <li><strong>End Time:</strong> <?php echo $data['event']->EndTime; ?></li>
                <li><strong>Status:</strong> <?php echo $data['event']->Status; ?></li>
                <li><strong>Additional Requests:</strong> <?php echo $data['event']->AdditionalRequests; ?></li>
            

            <li><strong>Your Current Status: </strong>

            <?php if ($data['action'] == 'Accepted') : ?>
                Accepted</li>
                
                <?php if ($_SESSION['user_type_id'] == 3) :?>
                    <a href="<?php echo URLROOT; ?>/partners/uploadImagesbyPhotographer/<?php echo $data['event']->EventID?>" target="_blank" class="button">Upload Completed Work</a>

                <?php elseif ($_SESSION['user_type_id'] == 4) :?>
                    <a href="<?php echo URLROOT; ?>/partners/viewImagesbyEditor/<?php echo $data['event']->EventID?>" target="_blank" class="button">View Uploaded Images</a>
                    <a href="<?php echo URLROOT; ?>/partners/uploadImagesbyEditor/<?php echo $data['event']->EventID?>" target="_blank" class="button">Upload Completed Work</a>

                <?php elseif ($_SESSION['user_type_id'] == 5) :?>
                    <a href="<?php echo URLROOT; ?>/partners/viewImagesbyPrinting/<?php echo $data['event']->EventID?>" target="_blank" class="button">View Uploaded Images</a>
                
                <?php endif;?>

                <a href="<?php echo URLROOT; ?>/partners/updatePartnerAction/<?php echo $_SESSION['user_type_id']; ?>/<?php echo $data['event']->EventID; ?>/Completed/OK" class="button">Mark As Complete</a>
            <?php elseif ($data['action'] == 'Declined') : ?>
                Declined</li>
            <?php elseif ($data['action']== 'Pending') : ?>
                Pending</li>
                <a href="<?php echo URLROOT; ?>/partners/updatePartnerAction/<?php echo $_SESSION['user_type_id']; ?>/<?php echo $data['event']->EventID; ?>/Accepted/Ok/" class="button">Accept</a>
                <a href="<?php echo URLROOT; ?>/partners/updatePartnerAction/<?php echo $_SESSION['user_type_id']; ?>/<?php echo $data['event']->EventID; ?>/Declined/Busy/" class="button">Decline</a>
            <?php elseif ($data['action'] == 'Completed') :?>
                <p class="status delivered">Completed</p>
            <?php endif; ?>
            </ul>
        
        </div>
    </div>

    <script>
       document.getElementById('viewLocationButton').addEventListener('click', function () {
            var latitude = <?php echo $data['event']->Latitude; ?>;
            var longitude = <?php echo $data['event']->Longitude; ?>;
            
            // Open OpenStreetMap in a new window with the specified coordinates
            var mapUrl = `https://www.openstreetmap.org/?mlat=${latitude}&mlon=${longitude}#map=13/${latitude}/${longitude}`;
            window.open(mapUrl, '_blank');
        });

        
    </script>
</body>
</html>

