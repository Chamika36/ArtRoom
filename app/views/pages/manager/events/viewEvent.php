<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Event</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/manageevent.css">
    <style>
        
    </style>
</head>
<body>
    <div class="container2">
        <h2>Manage Event</h2>
        <div class="event-details">
            <h3>Event Details</h3>
            <ul>
                <li><strong>Event Name:</strong> <?php echo $data['package']->Name; ?></li>
                <li><strong>Event Id:</strong> <?php echo $data['event']->EventID; ?></li>
                <li><strong>Date:</strong> <?php echo $data['event']->EventDate; ?></li>
                <li><strong>Location:</strong> <?php echo $data['event']->Location; ?></li>
                <li><strong>Status:</strong> <?php echo $data['event']->Status; ?></li>
                <li><strong>Additional Requests:</strong> <?php echo $data['event']->AdditionalRequests; ?></li>
                <li><strong>Requsted Photographer:</strong> <?php echo $data['requestedPhotographer']->FirstName . ' ' . $data['requestedPhotographer']->LastName; ?></li>
                <li><strong>Assigned Photographer:</strong> <?php echo $data['photographer']->FirstName . ' ' . $data['photographer']->LastName; ?> <Strong>Status : </Strong><?php echo $data['photographerAction']->Action; ?></li>
                <?php if ($data['photographerAction']->Action == 'Declined') : ?>
                    <div class="form-group">
                        <label for="photographer">Reallocate Photographer:</label>
                        <select name="photographer" id="photographer" required>
                            <option value="">Select a photographer</option>
                            <?php foreach ($data['photographers'] as $photographer) : ?>
                                <option value="<?php echo $photographer->UserID; ?>"><?php echo $photographer->FirstName . ' ' . $photographer->LastName; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="button reallocate-button" data-partner-type="3" data-partner-type-name="photographer">Reallocate</button>
                    </div>
                <?php endif; ?>

                <li><strong>Assigned Editor:</strong> <?php echo $data['editor']->FirstName . ' ' . $data['editor']->LastName; ?> <Strong>Status : </Strong><?php echo $data['editorAction']->Action; ?></li>
                <?php if ($data['editorAction']->Action == 'Declined') : ?>
                    <div class="form-group">
                        <label for="editor">Reallocate Editor:</label>
                        <select name="editor" id="editor" required>
                            <option value="">Select an editor</option>
                            <?php foreach ($data['editors'] as $editor) : ?>
                                <option value="<?php echo $editor->UserID; ?>"><?php echo $editor->FirstName . ' ' . $editor->LastName; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="reallocate-button" data-partner-type="4" data-partner-type-name="editor">Reallocate</button>
                    </div>
                <?php endif; ?>

                <li><strong>Assigned Printing Firm:</strong> <?php echo $data['printingFirm']->FirstName . ' ' . $data['printingFirm']->LastName; ?> <Strong>Status : </Strong><?php echo $data['printingFirmAction']->Action; ?></li>
                <?php if ($data['printingFirmAction']->Action == 'Declined') : ?>
                    <div class="form-group">
                        <label for="printingFirm">Reallocate Printing Firm:</label>
                        <select name="printingFirm" id="printingFirm" required>
                            <option value="">Select a printing firm</option>
                            <?php foreach ($data['printingFirms'] as $printingFirm) : ?>
                                <option value="<?php echo $printingFirm->UserID; ?>"><?php echo $printingFirm->FirstName . ' ' . $printingFirm->LastName; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="reallocate-button" data-partner-type="5" data-partner-type-name="printingFirm">Reallocate</button>
                    </div>
                <?php endif; ?>
            </ul>
        </div>

<?php
$json = trim($data['event']->SelectedExtras);
$json = html_entity_decode($json);
$jsonDecoded = json_decode($json, true);
?>
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
                <tr>
                    <th>Total Budget</th>
                    <td><?php echo $data['event']->TotalBudget; ?></td>
                </tr>
            </table>
        </div>

        <button class="button" onclick="window.location.href='<?php echo URLROOT; ?>/events/sendQuota/<?php echo $data['event']->EventID; ?>'">Send Quota to Customer</button>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.reallocate-button').on('click', function (e) {
                // e.preventDefault();

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
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    </script>
</body>