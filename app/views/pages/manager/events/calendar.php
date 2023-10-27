<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Calendar</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/calendar/calendar.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/calendar/evo-calendar.min.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/calendar/evo-calendar.midnight-blue-min.css"/>
</head>
<body>
    <div class="hero">
        <!-- Calendar -->
        <div id="calendar"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="<?php echo URLROOT ?>/js/evo-calendar.js"></script>

    <!-- Event Data -->
    <?php echo "<script>console.log('PHP: " . json_encode($data['requests']) . "');</script>"; ?>
    
    <script>
        var eventData = <?php echo json_encode($data['requests']); ?>;
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
                id: event.EventID,    // Use the correct property name
                name: event.Location,     // Use the correct property name
                description: event.StartTime, // Use the correct property name
                date: event.EventDate, // Use the correct property name
                type: 'event',     // Use the correct property name
            });
            });
        });
    </script>
</body>
</html>
