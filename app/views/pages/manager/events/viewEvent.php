<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Event</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/manager/manageevent.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        
    </style>
</head>
<body>
    <div class="container2">
        <!-- <h2>Manage Event</h2> -->
        <div class="event-details">
            <h3>Event Details</h3>
            <ul>
                <li><strong>Event Name:</strong> <?php echo $data['package']->Name; ?></li>
                <li><strong>Event Id:</strong> <?php echo $data['event']->EventID; ?></li>
                <li><strong>Customer Name:</strong> <?php echo $data['customer']->FirstName . ' ' . $data['customer']->LastName; ?></li>
                <li><strong>Date:</strong> <?php echo $data['event']->EventDate; ?></li>
                <li><strong>Start Time:</strong> <?php echo $data['event']->StartTime; ?></li>
                <li><strong>End Time:</strong> <?php echo $data['event']->EndTime; ?></li>
                <li><strong>Location:</strong> <?php echo $data['event']->Location; ?></li>
                <li><strong>Status:</strong> <?php echo $data['event']->Status; ?></li>
                <li><strong>Additional Requests:</strong> <?php echo $data['event']->AdditionalRequests; ?></li>
                <li><strong>Requsted Photographer:</strong> <?php echo $data['requestedPhotographer']->FirstName . ' ' . $data['requestedPhotographer']->LastName; ?></li>
                
                
                <li><strong>Photographer:</strong> <?php echo $data['requestedPhotographer']->FirstName . ' ' . $data['requestedPhotographer']->LastName; ?> <Strong>Status : </Strong>
                    <?php
                    $photographerAction = $data['photographerAction']->Action;
                    switch ($photographerAction) {
                        case 'Pending':
                            echo '<i class="fas fa-exclamation-circle" style="color: red;"></i> Pending';
                            break;
                        case 'Accepted':
                            echo '<i class="fas fa-check-circle" style="color: orange;"></i> Accepted';
                            break;
                        case 'Declined':
                            echo '<i class="fas fa-times-circle" style="color: red;"></i> Declined';
                            break;
                        case 'Completed':
                            echo '<i class="fas fa-check-circle" style="color: green;"></i> Completed';
                            break;
                        default:
                            echo 'Unknown Status';
                            break;
                    }
                    ?>
                </li>
                <?php if ($data['photographerAction']->Action == 'Declined') : ?>
                    <div class="form-group">
                        <label for="photographer">Reallocate Photographer:</label>
                        <select name="photographer" id="photographer" required>
                            <option value="">Select a photographer</option>
                            <?php foreach ($data['photographers'] as $photographer) : ?>
                                <option value="<?php echo $photographer->UserID; ?>"><?php echo $photographer->FirstName . ' ' . $photographer->LastName; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="button" class="button reallocate-button" data-partner-type="3" data-partner-type-name="photographer">Reallocate</button>
                    </div>
                <?php endif; ?>

                <li><strong>Editor:</strong> <?php echo $data['editor']->FirstName . ' ' . $data['editor']->LastName; ?> <Strong>Status : </Strong>
                    <?php
                    $editorAction = $data['editorAction']->Action;
                    switch ($editorAction) {
                        case 'Pending':
                            echo '<i class="fas fa-exclamation-circle" style="color: red;"></i> Pending';
                            break;
                        case 'Accepted':
                            echo '<i class="fas fa-check-circle" style="color: orange;"></i> Accepted';
                            break;
                        case 'Declined':
                            echo '<i class="fas fa-times-circle" style="color: red;"></i> Declined';
                            break;
                        case 'Completed':
                            echo '<i class="fas fa-check-circle" style="color: green;"></i> Completed';
                            break;
                        default:
                            echo 'Unknown Status';
                            break;
                    }
                    ?>
                </li>
                <?php if ($data['editorAction']->Action == 'Declined') : ?>
                    <div class="form-group">
                        <label for="editor">Reallocate Editor:</label>
                        <select name="editor" id="editor" required>
                            <option value="">Select an editor</option>
                            <?php foreach ($data['editors'] as $editor) : ?>
                                <option value="<?php echo $editor->UserID; ?>"><?php echo $editor->FirstName . ' ' . $editor->LastName; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="button" class="reallocate-button" data-partner-type="4" data-partner-type-name="editor">Reallocate</button>
                    </div>
                <?php endif; ?>

                <li><strong>Printing:</strong> <?php echo $data['printingFirm']->FirstName . ' ' . $data['printingFirm']->LastName; ?> <Strong>Status : </Strong>
                    <?php
                    $printingFirmAction = $data['printingFirmAction']->Action;
                    switch ($printingFirmAction) {
                        case 'Pending':
                            echo '<i class="fas fa-exclamation-circle" style="color: red;"></i> Pending';
                            break;
                        case 'Accepted':
                            echo '<i class="fas fa-check-circle" style="color: orange;"></i> Accepted';
                            break;
                        case 'Declined':
                            echo '<i class="fas fa-times-circle" style="color: red;"></i> Declined';
                            break;
                        case 'Completed':
                            echo '<i class="fas fa-check-circle" style="color: green;"></i> Completed';
                            break;
                        default:
                            echo 'Unknown Status';
                            break;
                    }
                    ?>
                </li>
                <?php if ($data['printingFirmAction']->Action == 'Declined') : ?>
                    <div class="form-group">
                        <label for="printingFirm">Reallocate Printing Firm:</label>
                        <select name="printingFirm" id="printingFirm" required>
                            <option value="">Select a printing firm</option>
                            <?php foreach ($data['printingFirms'] as $printingFirm) : ?>
                                <option value="<?php echo $printingFirm->UserID; ?>"><?php echo $printingFirm->FirstName . ' ' . $printingFirm->LastName; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="button" class="reallocate-button" data-partner-type="5" data-partner-type-name="printingFirm">Reallocate</button>
                    </div>
                <?php endif; ?>
            </ul>
        </div>

        <div class="event-details">
            <h3>Budget</h3>
            <table>
                <tr>
                    <th>Package Name</th>
                    <td><?php echo $data['package']->Name . ' - ' . $data['package']->Price; ?></td>
                </tr>
                <tr>
                    <th>Extras Selected</th>
                    <td>
                        <?php 
                        $json = $data['event']->SelectedExtras;
                        $json = html_entity_decode($json);
                        $extrasSelected = json_decode($json, true);
                        
                        if (!empty($extrasSelected)) {
                            echo '<table>';
                            echo '<tr><th>Name</th><th>Price</th><th>Quantity</th><th>Total</th></tr>';
                            
                            foreach ($extrasSelected as $extra) {
                                echo '<tr>';
                                echo '<td>' . $extra['name'] . '</td>';
                                echo '<td>' . $extra['price'] . '</td>';
                                echo '<td>' . $extra['quantity'] . '</td>';
                                echo '<td>' . $extra['totalofEach'] . '</td>';
                                echo '</tr>';
                            }
                            
                            echo '</table>';
                        } else {
                            echo 'No extras selected.';
                        }
                        ?>
                    </td>
                </tr>
                <!-- <tr>
                    <th>Additional Charges</th>
                    <td> -->
                        <?php 
                        $json = $data['event']->AdditionalCharges;
                        $json = html_entity_decode($json);
                        $additionalCharges = json_decode($json, true);
                        
                        if (!empty($additionalCharges)) {
                            echo '<tr>';
                            echo '<th>Additional Charges</th>';
                            echo '<td>';
                            echo '<table>';
                            echo '<tr><th>Reason</th><th>Price</th><th>Quantity</th><th>Total</th></tr>';
                            
                            foreach ($additionalCharges as $charge) {
                                echo '<tr>';
                                echo '<td>' . $charge['reason'] . '</td>';
                                echo '<td>' . $charge['price'] . '</td>';
                                echo '<td>' . $charge['quantity'] . '</td>';
                                echo '<td>' . $charge['total'] . '</td>';
                                echo '</tr>';
                            }
                            
                            echo '</table>';
                            echo '</td>';
                            echo '</tr>';
                        } 
                        ?>
                    <!-- </td>
                <tr> -->
                <th>Total Budget</th>
                    <td>
                        <?php echo $data['event']->TotalBudget; ?> 
                        <?php
                        $status = $data['event']->Status;
                        switch ($status) {
                            case 'Pencil':
                            case 'Accepted':
                                echo '<i class="fas fa-exclamation-circle" style="color: red;"></i> Pending';
                                break;
                            case 'Advanced':
                                echo '<i class="fas fa-check-circle" style="color: orange;"></i> Advanced';
                                break;
                            case 'FullPaid':
                                echo '<i class="fas fa-check-circle" style="color: green;"></i> Fully Paid';
                                break;
                            default:
                                break;
                        }
                        ?>
                    </td>
                </tr>
            </table>

            <?php if ($data['event']->Status === 'Pencil') : ?>
                <form id="additionalChargesForm" action="<?php echo URLROOT; ?>/events/sendQuota/<?php echo $data['event']->EventID; ?>" method="post">
                <h3>Additional Charges</h3>
                    <div class="additional-charges">
                        <label for="charge-name">Reason:</label>
                        <input type="text" id="reason">

                        <label for="charge-price">Price per each:</label>
                        <input type="number" id="price" min="0">

                        <label for="charge-quantity">Quantity:</label>
                        <input type="number" id="quantity" min="0" value="1">

                        <button type="button" class="button" onclick="addAdditionalCharge()">+</button>
                    </div>

                    <div id="additionalChargesDisplay">
                        <!-- Display selected extras with quantities -->
                    </div>

                    <input type="hidden" id="additionalCharges" name="additionalCharges" value="[]">

                    <label for="revisedBudget">Revised Budget:</label>
                    <input type="number" id="revisedBudget" name="revisedBudget" value="<?php echo $data['event']->TotalBudget; ?>" readonly>

                    <button type="submit" class="button">Send Quota to Customer</button>
                </form>
            <?php endif; ?>
            
            <!-- cancel event -->
            <div class="form-group">
                <a href="<?php echo URLROOT; ?>/events/updateEventStatus/<?php echo $data['event']->EventID; ?>/Canceled" class="button" style="background-color: #dc3545; color: white; ">Cancel Event</a>
                <a href="<?php echo URLROOT; ?>/events/updateEventStatus/<?php echo $data['event']->EventID; ?>/Completed" class="button">Complete Event</a>
            </div>


        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Reallocate partners
            $('.reallocate-button').on('click', function (e) {
                e.preventDefault();

                var partnerType = $(this).data('partner-type');
                var partnerTypeName = $(this).data('partner-type-name');
                var eventId = <?php echo $data['event']->EventID; ?>;
                var selectedPartner = $('select[name="' + partnerTypeName + '"]').val();

                console.log(partnerType);
                console.log(eventId);
                console.log(selectedPartner);

                // Send AJAX request using Fetch API
                fetch('<?php echo URLROOT; ?>/events/reallocate/' + eventId, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        partnerType: partnerType,
                        selectedPartner: selectedPartner,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    // Update the view based on the response
                    // You can display a success message or handle the view update as needed
                    console.log(data);
                    //location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });

        

        // Add additional charge
        let additionalCharges = [];

        function addAdditionalCharge() {
            let reason = document.getElementById('reason').value;
            let price = document.getElementById('price').value;
            let quantity = document.getElementById('quantity').value;

            let total = price * quantity;

            if(quantity > 0 && price > 0 && reason != ''){
                let additionalCharge = {
                    reason: reason,
                    price: price,
                    quantity: quantity,
                    total: total,
                };

                additionalCharges.push(additionalCharge);
                displayadditionalCharges();
                updateRevisedBudget();

                document.getElementById('additionalCharges').value = JSON.stringify(additionalCharges);

                $('#reason').val('');
                $('#price').val('');
                $('#quantity').val('1');
            }
        }

        function displayadditionalCharges() {
            let additionalChargesDiv = $('#additionalChargesDisplay');
            additionalChargesDiv.empty();

            additionalCharges.forEach(additionalCharge => {
                additionalChargesDiv.append(`<p>${additionalCharge.reason} - Price: ${additionalCharge.price} - Quantity: ${additionalCharge.quantity}  - Total: ${additionalCharge.total}</p>`);
            });
        }

        function updateRevisedBudget() {
            let revisedBudget = document.getElementById('revisedBudget');
            let totalBudget = <?php echo $data['event']->TotalBudget; ?>;
            let additionalChargesTotal = additionalCharges.reduce((total, charge) => total + charge.total, 0);
            revisedBudget.value = totalBudget + additionalChargesTotal;
        }
    </script>
</body>