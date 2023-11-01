<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Three Areas Layout</title>
    <link rel="stylesheet" href="../../../../public/css/customer-navbar.css">
    <link rel="stylesheet" href="../../../../public/css/grid.css">
    <link rel="stylesheet" href="../../../../public/css/logo.css">
    <link rel="stylesheet" href="../../../../public/css/customer-mainPages.css">
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

        .requestQuote{
            width: 281px;
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
                <h2 class="requestQuote">Request Quote</h2>
                <form>
                    <label for="event-type">Event Type</label>
                    <select id="event-type" name="event-type">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                    </select>

                    <label for="event-date">Event Date</label>
                    <input type="date" id="event-date" name="event-date">

                    <label for="location">Location</label>
                    <input type="text" id="location" name="location">

                    <label for="select-photographer">Select Photographer</label>
                    <select id="select-photographer" name="select-photographer">
                        <option value="photographer1">Photographer 1</option>
                        <option value="photographer2">Photographer 2</option>
                    </select>

                    <label for="selected-package">Selected Package</label>
                    <select id="selected-package" name="selected-package">
                        <option value="package1">Package 1</option>
                        <option value="package2">Package 2</option>
                    </select>

                    <label for="additional-request">Additional Request</label>
                    <textarea id="additional-request" name="additional-request" rows="4"></textarea>

                    <label for="special-request">Special Request</label>
                    <textarea id="special-request" name="special-request" rows="4"></textarea>

                    <label for="budget">Rough Calculated Budget</label>
                    <input type="number" id="budget" name="budget" min="0">

                    <input type="submit" value="Send Request">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
