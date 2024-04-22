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
</body>
</html>

