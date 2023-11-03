<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <title>Home</title>
    <style>
        /* Example CSS for the layout */
        .bottom-container {
            margin: -100px 20px 20px; /* Adjust the top margin */
            display: flex;
            flex-direction: column;
            height: 100%; /* Ensure the container takes up the full height of the viewport */
        }

        .row {
            display: flex;
            margin: 10px 0;
        }

        .column {
            flex: 1;
            margin: 0 10px;
            padding: 10px;
            border: 1px solid #ccc;
            position: relative;
        }

        .event-square {
            width: 100px;
            height: 100px;
            background-color: #3498db;
            color: #fff;
            text-align: center;
            line-height: 100px;
            font-weight: bold;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .details {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .detail-item {
            margin: 5px 0;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .button {
            padding: 10px;
            margin: 5px 0;
            background-color: #4CAF50; /* Green color for "Accept" */
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .button.decline {
            background-color: #FF5733; /* Red color for "Decline" */
        }
    </style>
</head>
<body>
    <?php include(APPROOT . '/views/include/partner-navbar.php'); ?>

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
</body>
</html>
