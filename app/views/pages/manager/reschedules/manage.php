<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Event</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/manager/manageevent.css">
    <style>
        
    </style>
</head>
<body>
    <?php $reschedule = $data['reschedule'];?>
    <div class="container2">
        <!-- <h2>Manage Event</h2> -->
        <div class="event-details">
            <h3>Event Details</h3>
            <ul>
                <li><strong>Event Name:</strong> <?php echo $data['package']->Name; ?></li>
                <li><strong>Event Id:</strong> <?php echo $data['event']->EventID; ?></li>
                <li><strong>Customer Name:</strong> <?php echo $data['customer']->FirstName . ' ' . $data['customer']->LastName; ?></li>
                <li><strong>Date:</strong> <?php echo $data['event']->EventDate; ?></li>
                <li><strong>Start Time:</strong> <?php echo $data['event']->StartTime; ?></li>
                <li><strong>End Time:</strong> <?php echo $data['event']->EndTime; ?></li>
                <li><strong>Location:</strong> <?php echo $data['event']->Location; ?></li>
                <li><strong>Status:</strong> <?php echo $data['event']->Status; ?></li>
                <li><strong>Additional Requests:</strong> <?php echo $data['event']->AdditionalRequests; ?></li>
                <li><strong>Reschedule Request Status: </strong>  <?php echo $reschedule->ApprovalStatus; ?></li>
                <li><strong>Assigned Photographer:</strong> <?php echo $data['photographer']->FirstName . ' ' . $data['photographer']->LastName; ?></li>
                <?php //if($reschedule->ApprovalStatus == 'PhotographerDeclined') :?>
                <div class="form-group">
                    <label for="photographer">Reallocate Photographer:</label>
                    <select name="photographer" id="photographer" required>
                        <option value="">Select a photographer</option>
                        <?php foreach ($data['photographers'] as $photographer) : ?>
                            <option value="<?php echo $photographer->UserID; ?>"><?php echo $photographer->FirstName . ' ' . $photographer->LastName; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="button" class="button reallocate-button" data-partner-type="3" data-partner-type-name="photographer">Reallocate</button>
                </div>
                <?php// endif ?>
            </ul>
        </div>

        <div class="event-details">
            <h3>Reschedule Details</h3>
            <ul>
                <li><strong>Reschedule ID:</strong> <?php echo $reschedule->ID; ?></li>
                <li><strong>Event ID:</strong> <?php echo $reschedule->EventID; ?></li>
                <li><strong>New Event Date:</strong> <?php echo $reschedule->NewEventDate; ?></li>
                <li><strong>New Start Time:</strong> <?php echo $reschedule->NewStartTime; ?></li>
                <li><strong>New End Time:</strong> <?php echo $reschedule->NewEndTime; ?></li>
                <li><strong>New Location:</strong> <?php echo $reschedule->NewLocation; ?></li>
            </ul>

            <a href="<?php echo URLROOT; ?>/reschedules/confirm/<?php echo $reschedule->ID; ?>"><button class="button danger">Confirm Reschedule</button></a>
            <a href="<?php echo URLROOT; ?>/reschedules/cancel/<?php echo $reschedule->ID; ?>"><button class="button">Cancel Reschedule</button></a>

            <!-- cancel event -->
            <!-- <form action="<?php// echo URLROOT; ?>/events/updateEventStatus/<?php// echo $data['event']->EventID; ?>/Canceled" method="POST">
                <div class="form-group">
                    <input class="button" type="submit" value="Cancel Event">
                </div>
            </form> -->

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Reallocate partners
            $('.reallocate-button').on('click', function (e) {
                e.preventDefault();

                var partnerType = $(this).data('partner-type');
                var partnerTypeName = $(this).data('partner-type-name');
                var eventId = <?php echo $data['event']->EventID; ?>;
                var selectedPartner = $('select[name="' + partnerTypeName + '"]').val();

                console.log(partnerType);
                console.log(eventId);
                console.log(selectedPartner);

                // Send AJAX request using Fetch API
                fetch('<?php echo URLROOT; ?>/events/reallocate/' + eventId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        partnerType: partnerType,
                        selectedPartner: selectedPartner,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    // Update the view based on the response
                    // You can display a success message or handle the view update as needed
                    console.log(data);
                    //location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    </script>
</body>