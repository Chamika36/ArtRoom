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
     <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            background-color: #242526;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s;
            align-self: flex-end; /* Move the submit button to the right bottom corner */
        }

        .bottom-column input[type="submit"]:hover {
            background-color: #f9b234;
            color: #242526
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
        <!-- <div class="left-area">
            <//?php include(APPROOT . '/views/pages/customer/sidebar/sidebar.php'); ?>
        </div> -->

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
                    <input type="time" id="endTime" name="endTime" min="" required>

                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" value="Choose location" required readonly>
                    <input type="hidden" id="latitude" name="latitude" value="" required>
                    <input type="hidden" id="longitude" name="longitude" value="" required>
                    <span class="invalid-feedback"><?php echo $data['location_err']; ?></span>
                    <!-- Map container -->
                    <div id="map" style="height: 300px;"></div>

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

                    <!-- Additional Items -->
                    <label for="extras">Select Extras:</label>
                    <select id="extras" name="extras">
                        <option value="1500.00">Additional Album Page - Rs. 1,500.00</option>
                        <option value="70.00">Thanking Card - Rs. 70.00</option>
                        <option value="8500.00">20 x 30 Enlagement - Rs. 8,500.00</option>
                        <option value="7000.00">16 x 24 Enlagement - Rs. 7,000.00</option>
                        <option value="2500.00">12 x 18 Enlagement - Rs. 2,500.00</option>
                        <option value="4000.00">Signature Board - Rs. 4,000.00</option>
                        <option value="10000.00">Family Album - Rs. 10,000.00</option>
                    </select>

                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" step="1">

                    <button type="button" onclick="addExtra()">Add Extra</button>

                    <div id="selectedExtrasDisplay">
                        <!-- Display selected extras with quantities -->
                    </div>

                    <label for="additionalRequest">Additional Request</label>
                    <textarea id="additionalRequests" name="additionalRequests" rows="4"></textarea>

                    <label for="totalBudget">Total Budget:</label>
                    <input type="text" id="totalBudget" name="totalBudget" readonly>

                    <input type="" id="selectedExtras" name="selectedExtras" value="" readonly>

                    <input type="hidden" id="customer" name="customer" value="<?php echo $_SESSION['user_id']; ?>">

                    <input type="submit" value="Send Request">
                </form>
            </div>
        </div>
    </div>

    </script>
    <script>

    $(document).ready(function() {

        // Set the minimum time for end time based on start time
        $('#startTime').change(function () {
            $('#endTime').attr('min', $(this).val());
        });

        // Get available photographers based on selected date
        $('#date').change(function() {
            var selectedDate = $(this).val();

            $.ajax({
                url: '<?php echo URLROOT; ?>/events/getAvailablePhotographers', // Update with your server endpoint
                method: 'POST',
                data: { selectedDate: selectedDate },
                success: function(response) {
                    $('#requestedPhotographer').html(response); // Replace dropdown options with updated list
                },
                error: function(xhr, status, error) {
                    console.error(error); // Handle errors if needed
                }
            });
        });

        // Set total budget to package price when package is selected
        $('#package').change(function() {
            updateTotalBudget();
        })
    });

    // Calcualte total budget
    let selectedExtras = [];

        function addExtra() {
            let selectedExtra = $('#extras').val();
            let quantity = $('#quantity').val();
            let totalofEach = selectedExtra * quantity;

            if (quantity > 0) {
                selectedExtras.push({
                    name: $('#extras option:selected').text(),
                    price: selectedExtra,
                    quantity: quantity,
                    totalofEach: totalofEach
                });

                displaySelectedExtras();
                updateTotalBudget();

                $('#selectedExtras').val(JSON.stringify(selectedExtras));
            }

            // Reset the form fields
            $('#extras').val('');
            $('#quantity').val('');
        }

        function displaySelectedExtras() {
            let selectedExtrasDiv = $('#selectedExtrasDisplay');
            selectedExtrasDiv.empty();

            selectedExtras.forEach(extra => {
                selectedExtrasDiv.append(`<p>${extra.name} - Quantity: ${extra.quantity} - Total: ${extra.totalofEach}</p>`);
            });
        }

        function updateTotalBudget() {
            let totalBudget = calculateTotalBudget();
            $('#totalBudget').val(totalBudget);
        }

        function calculateTotalBudget() {
            let packagePrice = parseFloat($('#package option:selected').data('price')) || 0;
            let extrasTotal = selectedExtras.reduce((total, extra) => {
                return total + (parseFloat(extra.price) * parseInt(extra.quantity));
            }, 0);

            return packagePrice + extrasTotal;
        }
    </script>

    <script>
        var map = L.map('map').setView([0, 0], 2); // Set an initial view

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Add a marker when the user clicks on the map
        map.on('click', function (e) {
            var locationInput = document.getElementById('location');
            var latitudeInput = document.getElementById('latitude');
            var longitudeInput = document.getElementById('longitude');

            // Use Nominatim for reverse geocoding
            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${e.latlng.lat}&lon=${e.latlng.lng}`)
            .then(response => response.json())
            .then(data => {
                if (data.display_name) {
                    locationInput.value = data.display_name;
                    latitudeInput.value = e.latlng.lat;
                    longitudeInput.value = e.latlng.lng;
                }
            });
        });
    </script>

</body>
</html>
