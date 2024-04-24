<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event reschedule page</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-navbar.css">
    <link rel="stylesheet" href="../../../../public/css/grid.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/logo.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-mainPages.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/reschedule.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />

    
</head>
<body>
    <?php
        $maxDate = date('Y-m-d', strtotime('+3 months'));  // Date 3 months from today
        $minDate = date('Y-m-d', strtotime('+2 weeks')); // Date 2 weeks from today
    ?>

    <div>
    <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
    </div>
    <div class="container">
        <div>
            <h1><b>Reschedule Request</b></h1>
        </div>
            
                <form class="form" action="<?php echo URLROOT ;?>/reschedules/reschedule/<?php echo $data['id'];?>" method="POST">
                    <div class="input-box">
                        <label for="event-date"><b>Event Date</b></label>
                        <input type="date" id="date" name="date" min="<?php echo $minDate; ?>" max="<?php echo $maxDate; ?>" required>
                    </div>
                    <div class="input-box">     
                        <label for="event-time"><b>Start Time</b></label>
                        <input type="time" id="startTime" name="startTime" value="<?php echo $data['startTime'];?>">
                    </div>
                    <div class="input-box">
                        <label for="event-time"><b>End Time</b></label>
                        <input type="time" id="endTime" name="endTime" value="<?php echo $data['endTime'];?>">
                    </div>
                    <div class="input-box">
                        <label for="location"><b>Location</b></label>
                        <input type="text" id="location" name="location" value="<?php echo $data['location'];?>">
                    </div>
                    <div>
                        <input class="submit-button" type="submit" value="Send Request">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
