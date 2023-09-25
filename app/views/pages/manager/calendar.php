<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Calendar</title>
    <link rel="stylesheet" href="../../../../public/css/calendar.css">
</head>
<body>
    <div class="calendar">
        <header>
            <h1>Event Calendar</h1>
        </header>
        <div class="month">
            <span class="prev">&#9665;</span>
            <h2>June 2023</h2>
            <span class="next">&#9655;</span>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
            </thead>
            <tbody class="days">
                <!-- Calendar days will be generated here -->
            </tbody>
        </table>
        <div class="event-list">
            <h2>Events</h2>
            <ul class="events">
                <!-- Events will be listed here -->
            </ul>
        </div>
    </div>
    <script src="../../../../public/javascript/calendar.js"></script>
</body>
</html>
