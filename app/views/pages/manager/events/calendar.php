<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Calendar</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/calendar/calendar.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/calendar/evo-calendar.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/calendar/evo-calendar.midnight-blue.css"/>

    <style>
        .modal {
            display: none;
            position: absolute;
            z-index: 1;
            left: 100px;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.7);
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="hero">
        <!-- Calendar -->
        <div id="calendar"></div>
    </div>

    <!-- Add HTML for the modal dialog -->
    <div class="modal" id="eventModal">
        <div class="modal-content" id="eventDetails">
            <?php include(APPROOT . '/views/manager/dashboard.php'); ?>
            <!-- Event details will be displayed here -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="<?php echo URLROOT ?>/js/evo-calendar.js"></script>

    <script>
        var eventData = <?php echo json_encode($data['requests']); ?>;
        var manageUrl = <?php echo json_encode(URLROOT . '/events/manageevent/'); ?>;
        console.log("Event Data:", eventData);
    </script>
 
    <script>
        // Initialize your calendar, once the page's DOM is ready
        $(document).ready(function() {
            $('#calendar').evoCalendar({
                theme: 'Midnight Blue',
                format: 'yyyy-mm-dd'
            });

            eventData.forEach(function(event) {
                console.log("ID: " + event.EventID);
                console.log("Name: " + event.Name);
                console.log("Date: " + event.EventDate);
                console.log("Type: " + event.Type);

                // Add events to the calendar
                $('#calendar').evoCalendar('addCalendarEvent', {
                    id: event.EventID,
                    name: event.Location,
                    description: event.StartTime,
                    date: event.EventDate,
                    type: 'event',
                });
            });

            // Add a click event handler for calendar events
            $('#calendar').on('selectEvent', function (event, eventData) {
                if (eventData.id) {
                    // Open a new window or modal and load the external PHP file
                    var popupUrl = manageUrl + eventData.id;
                    // newWindow = window.open(popupUrl, '_blank', 'width=400,height=400');
                    $('#eventDetails').load(popupUrl, function() {
                        $('#eventModal').css('display', 'block');
                    });
                }
            });

            // Close the modal when clicking outside of it
            $('#eventModal').on('click', function (e) {
                if (e.target === this) {
                    $(this).css('display', 'none');
                }
            });
        });
    </script>
</body>
</html>
