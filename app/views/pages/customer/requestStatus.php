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
        justify-content: space-between; /* This will create a two-column layout */
    }


        .status-container {
        flex: 0.8; /* This will make the status-container take up 50% of the available space */
        background-color: #f0f0f0;
        padding: 20px;
        border-radius: 10px;
        margin-left: 10%;
        
        
    }
        .status-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            margin-left: 5%;
        }

        .status-item i {
            font-size: 24px;
            margin-right: 10px;
        }

        .status-buttons {
    display: flex;
    flex-direction: column; 
    align-items: center; /* Center buttons vertically */
    justify-content: center; /* Center buttons horizontally */
    margin-right: 13%;
}

.status-buttons button {
    padding: 10px 20px;
    margin: 10px 0; /* Add some spacing between the buttons and stack them vertically */
    background-color: #E7D1B6;
    color: black;
    border: none;
    border-radius: 15px;
    cursor: pointer;
    transition: background-color 0.2s;
    color: #000;
    font-family: Radio Canada;
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: 48.5px; /* 303.125% */
    letter-spacing: 0.96px;
}

.status-buttons button:hover {
    background-color: #774001;
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
                <?php //include(APPROOT . '/views/pages/customer/sidebar/sidebar.php'); ?>
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
                    <div class="status-buttons">
                        <?php
                        if ($data['event']->Status == 'Accepted') { 
                            echo '<p> Total Budget Confirmed : ' . $data['event']->TotalBudget . '</p>';
                            $advancedPayment = $data['event']->TotalBudget*0.5;
                            echo '<p> Advanced Payment : ' . $advancedPayment . '</p>';
                            echo '<a href="' . URLROOT . '/payments/makePayment/' . $data['event']->EventID . '"><button><b>Make Payment</b></button></a>';
                        } else {
                            echo '<p> Yet to confirm the request </p> ';
                        }
                        ?>
                        <a href="<?php echo URLROOT ?>/events/deleteRequest/<?php echo $data['event']->EventID ?>"><button><b>Cancel Request</b></button></a>
                        <a href="<?php echo URLROOT ?>/events/rescheduleRequest/<?php echo $data['event']->EventID ?>"><button><b>Reschedule Request</b></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
