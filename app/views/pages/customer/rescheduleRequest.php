<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event status</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-navbar.css">
    <link rel="stylesheet" href="../../../../public/css/grid.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/logo.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-mainPages.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />

    <style>
        .bottom-column {
            flex: 4;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .bottom-column form {
            display: flex;
            flex-direction: column;
            max-width: 60%; /* Adjust the maximum width as needed */
            margin: 0 auto; /* Center the form horizontally */
        }

        .bottom-column label {
            font-weight: bold;
            margin-top: 10px;
        }

        .bottom-column select,
        .bottom-column input,
        .bottom-column textarea {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .bottom-column input[type="date"] {
            width: 100%;
        }

        .bottom-column input[type="submit"] {
            background-color: #504334;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s;
            align-self: flex-end; /* Move the submit button to the right bottom corner */
        }

        .bottom-column input[type="submit"]:hover {
            background-color: #774001;
        }

        .rescheduleRequest {
            width: 350px;
            height: 48px;
            flex-shrink: 0;
            color: #000;
            text-align: center;
            font-family: Istok Web;
            font-size: 32px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            letter-spacing: 1.6px;
            mix-blend-mode: darken;
            margin-left: 10%;
        }

        .status {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-top: 20px;
        }

        .status-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-top: 20px;
            background-color: #f0f0f0; /* Background color for the square shape */
            padding: 20px; /* Add padding to give space around the status items */
            border-radius: 10px; /* Add rounded corners to the background */
            margin-left: 10%; /* Move the container somewhat to the right */
            width: 50%; /* Increase the width of the container */
        }

        .status-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .status-item i {
            font-size: 24px;
            margin-right: 10px;
        }

        /* Add individual colors for status items */
        .request-sent {
            color: black; /* or your desired color */
        }

        .photographer-accepted {
            color: black; /* or your desired color */
        }

        .editor-accepted {
            color: black; /* or your desired color */
        }

        .manager-accepted {
            color: black; /* or your desired color */
        }
    </style>
</head>
<body>
    <div>
    <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
    </div>
    <div class="container">
        <div class="bottom-row">
        <div class="left-area">
            <div style="text-align: center;"><img src="<?php echo URLROOT ?>/images/logo.png" alt="Your Image" class="logo"></div>
            <div class="x">
                <div class="button">User Profile</div>
                <div class="button">Request Quote</div>
                <div class="button">Event Upgrade</div>
                <div class="button">Log Out</div>
            </div>
        </div>
            <div class="bottom-column">
            <h2 class="rescheduleRequest">Status of the Request</h2>
            <div class="status">
                <div class="status-container">
                <div class="status-item request-sent">
                    <i class="fas fa-check-circle"></i> Request sent
                </div>
                <div class="status-item photographer-accepted">
                    <i class="fas fa-check-circle"></i> Photographer accepted the Request
                </div>
                <div class="status-item editor-accepted">
                    <i class="fas fa-check-circle"></i> Editor accepted the Request
                </div>
                <div class="status-item manager-accepted">
                    <i class="fas fa-check-circle"></i> Manager accepted the Request
                </div>
                <div class="status-item pencil-request">
                    <i class="fas fa-check-circle"></i> Saved as a pencil request
                </div>
                <div class="status-item advanced-payment">
                    <i class="fas fa-check-circle"></i> Advance Payment completed
                </div>
                <div class="status-item event-confirmed">
                    <i class="fas fa-check-circle"></i> Event Confirmed
                </div>
                <div class="status-item payment-confirmed">
                    <i class="fas fa-check-circle"></i> Full Payment completed
                </div>
                <div class="status-item photographer-working">
                    <i class="fas fa-check-circle"></i> Photographer is working on the order
                </div>
                <div class="status-item editor-working">
                    <i class="fas fa-check-circle"></i> Editor is working on the order
                </div>
                <div class="status-item printing-working">
                    <i class="fas fa-check-circle"></i> Printing Firm is working on the order
                </div>
                <div class="status-item order-completed">
                    <i class="fas fa-check-circle"></i> Order Completed
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
