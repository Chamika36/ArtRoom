<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Request</title>
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
            background-color: rgba(189, 179, 32, 0.08);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .bottom-column input[type="date"] {
            
            background-color: rgba(189, 179, 32, 0.08);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
    <?php
    $maxDate = date('Y-m-d', strtotime('+3 months'));  // Date 3 months from today
    $minDate = date('Y-m-d', strtotime('+2 weeks')); // Date 2 weeks from today
    ?>

    <div>
    <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
    </div>
    <div class="container">
        <div class="bottom-row">
        <div class="left-area">
            <?php include(APPROOT . '/views/pages/customer/sidebar/sidebar.php'); ?>
        </div>

            <div class="bottom-column">
                <h2 class="requestQuote">Request Quote</h2>
                <form action="<?php echo URLROOT; ?>/events/request" method="POST">
                    <!-- <label for="event-type">Event Type</label>
                    <select id="event-type" name="event-type">
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                    </select> -->

                    <label for="date">Event Date</label>
                    <input type="date" id="date" name="date" min="<?php echo $minDate; ?>" max="<?php echo $maxDate; ?>" required>
                    <span class="invalid-feedback"><?php echo $data['eventDate_err']; ?></span>

                    <label for="startTime">Start Time</label>
                    <input type="time" id="startTime" name="startTime" required>

                    <label for="endTime">End Time</label>
                    <input type="time" id="endTime" name="endTime" required>

                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" required>
                    <span class="invalid-feedback"><?php echo $data['location_err']; ?></span>

                    <label for="requestedPhotographer">Request Photographer</label>
                    <select id="requestedPhotographer" name="requestedPhotographer">
                    <option value="">Select a photographer</option>
                        <?php foreach ($data['photographers'] as $photographer) : ?>
                            <option value="<?php echo $photographer->UserID; ?>"><?php echo $photographer->FirstName . ' ' . $photographer->LastName; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="package">Selected Package</label>
                    <select id="package" name="package" required>
                        <option value="">Select a package</option>
                        <?php foreach ($data['packages'] as $package) : ?>
                            <option value="<?php echo $package->PackageID; ?>" data-price="<?php echo $package->Price; ?>"><?php echo $package->Name . " - Rs. " . $package->Price ; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="additionalRequest">Additional Request</label>
                    <textarea id="additionalRequests" name="additionalRequests" rows="4"></textarea>


                    <input type="hidden" id="customer" name="customer" value="<?php echo $_SESSION['user_id']; ?>">

                    <input type="submit" value="Send Request">
                </form>
            </div>
        </div>
    </div>

    <script>
    // Function to update the budget based on the selected package
        function updateBudget() {
            // Get the selected package's price
            var selectedPackage = document.getElementById("package");
            var selectedPackageOption = selectedPackage.options[selectedPackage.selectedIndex];
            var packagePrice = selectedPackageOption.getAttribute("data-price");

            // Update the budget input field with the package price
            var budgetInput = document.getElementById("budget");
            budgetSpan.textContent = packagePrice;
        }

        // Attach the updateBudget function to the package dropdown's change event
        document.getElementById("package").addEventListener("change", updateBudget);
    </script>


</body>
</html>
