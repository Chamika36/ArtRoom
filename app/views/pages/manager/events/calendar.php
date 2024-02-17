<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Calendar</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/calendar/calendar.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/calendar/evo-calendar.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/calendar/evo-calendar.midnight-blue.css"/>

</head>
<body>

    <input type="checkbox" id="showEvents" <?php if($data['type'] == 'ongoing' || $data['type'] == 'all') echo 'checked';?>>
    <label for="showEvents">Show Events</label>

    <input type="checkbox" id="showRequests" <?php if($data['type'] == 'request' || $data['type'] == 'all') echo 'checked';?>>
    <label for="showRequests">Show Requests</label>
    
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
        var eventData = <?php echo json_encode($data['events']); ?>;
        var ongoingData = <?php echo json_encode($data['ongoing']); ?>;
        var requestData = <?php echo json_encode($data['requests']); ?>;
        var manageUrl = <?php echo json_encode(URLROOT . '/events/manageevent/'); ?>;
        <?php if (isset($data['eventID'])) : ?>
            var eventId = <?php echo json_encode($data['eventID']); ?>;
        <?php endif; ?>

        console.log("Event Data:", eventData);
        var showEvents = $('#showEvents').prop('checked');
        var showRequests = $('#showRequests').prop('checked');
    </script>
 
    <script>
        // Initialize your calendar, once the page's DOM is ready
        $(document).ready(function() {
            $('#calendar').evoCalendar({
                theme: 'Midnight Blue',
                format: 'yyyy-mm-dd'
            });

            $('#calendar').evoCalendar('selectMonth', 1); 

            // Add events to the calendar
            if (showEvents) {
                ongoingData.forEach(function(event) {
                    var color = '#63d8677';
                    var type = 'event';

                    if(event.Status != 'Pencil') {
                        type = 'event';
                        color = 'orange';
                    }else{
                        type = 'holiday';
                        color = 'red';
                    }

                    // Add events to the calendar
                    $('#calendar').evoCalendar('addCalendarEvent', {
                        id: event.EventID,
                        name: event.EventDate,
                        badge: event.StartTime,
                        description: event.Location,
                        date: event.EventDate,
                        type: type,
                        color: color
                    });
                });
            }

            if (showRequests) {
                requestData.forEach(function(event) {
                    var color = '#63d8677';
                    var type = 'event';

                    if(event.Status != 'Pencil') {
                        type = 'event';
                        color = 'orange';
                    }else{
                        type = 'holiday';
                        color = 'red';
                    }

                    // Add events to the calendar
                    $('#calendar').evoCalendar('addCalendarEvent', {
                        id: event.EventID,
                        name: event.EventDate,
                        badge: event.StartTime,
                        description: event.Location,
                        date: event.EventDate,
                        type: type,
                        color: color
                    });
                });
            }
            
            function updateCalendar() {
                // var active_date = $('#calendar').evoCalendar('getActiveDate');
                // var selectedMonth = active_date.split('-')[1];
                var showEvents = $('#showEvents').prop('checked');
                var showRequests = $('#showRequests').prop('checked');
                console.log('break 1');


                $('#calendar').evoCalendar('destroy'); // Destroy the existing calendar
                console.log('break 2');
                $('#calendar').evoCalendar({ // Re-initialize the calendar with updated data
                    theme: 'Midnight Blue',
                    format: 'yyyy-mm-dd'
                });
                console.log('break 3');

                $('#calendar').evoCalendar('selectMonth', 1); 

                if (showEvents) {
                    ongoingData.forEach(function(event) {
                        var color = '#63d8677';
                        var type = 'event';

                        if(event.Status != 'Pencil') {
                            type = 'event';
                            color = 'orange';
                        }else{
                            type = 'holiday';
                            color = 'red';
                        }

                        // Add events to the calendar
                        $('#calendar').evoCalendar('addCalendarEvent', {
                            id: event.EventID,
                            name: event.EventDate,
                            badge: event.StartTime,
                            description: event.Location,
                            date: event.EventDate,
                            type: type,
                            color: color
                        });
                    });
                }

                if (showRequests) {
                    requestData.forEach(function(event) {
                        var color = '#63d8677';
                        var type = 'event';

                        if(event.Status != 'Pencil') {
                            type = 'event';
                            color = 'orange';
                        }else{
                            type = 'holiday';
                            color = 'red';
                        }

                        // Add events to the calendar
                        $('#calendar').evoCalendar('addCalendarEvent', {
                            id: event.EventID,
                            name: event.EventDate,
                            badge: event.StartTime,
                            description: event.Location,
                            date: event.EventDate,
                            type: type,
                            color: color
                        });
                    });
                }

            }

            // Event listeners for the checkboxes
            // $('#showEvents, #showRequests').change(function () {
            //     updateCalendar();
            // });


            $(document.body).on('change', '#showEvents, #showRequests', function () {
                console.log('Checkbox changed');
                updateCalendar();
            });

            // Add a click event handler for calendar events
            $('#calendar').on('selectEvent', function (event, eventData) {
                if (eventData.id) {
                    // Open a new window or modal and load the external PHP file
                    var popupUrl = manageUrl + eventData.id;
                    $('#eventDetails').load(popupUrl, function () {
                        $('#eventModal').css('display', 'block');
                    });
                }
            });

            // Close the modal when clicking outside of it
            $(document.body).on('click', '#eventModal', function (e) {
                if (e.target === this) {
                    $(this).css('display', 'none');
                    location.reload();
                }
            });

            function openModal(eventId) {
                if (eventId) {
                    // Open a new window or modal and load the external PHP file
                    var popupUrl = manageUrl + eventId;
                    $('#eventDetails').load(popupUrl, function () {
                        $('#eventModal').css('display', 'block');
                    });
                }
            }

            if(eventId){
                openModal(eventId);
            }

        });
    </script>
</body>
</html>
