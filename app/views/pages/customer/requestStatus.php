<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event status</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-navbar.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/logo.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-mainPages.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/payment-page.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<style>
.details{
    color: rgb(105, 105, 105);
    
}
</style>
    <body>
            <div>
                <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
            </div>
            
                
                <h2 class="rescheduleRequest">Status of the Request</h2>

                <div class="container">
                    <div class="details-container">
                        <div class="status-container-1">
                                <div class="event-status-container">
                                    <!-- Request Sent -->
                                    <h3>Event Status</h3>
                                    <div class="status-item <?php echo ($data['event']->Status != 'Pencil' ? 'Completed' : ''); ?>">
                                        <i class="fas <?php echo (in_array($data['event']->Status, ['Pencil','Accepted', 'Advanced', 'FullPaid', 'Completed']) ? 'fa-regular fa-circle-check' : 'fa-solid fa-spinner fa-pulse'); ?>"></i> Request sent
                                    </div>

                                    <!-- Manager Accepted -->
                                    <div class="status-item <?php echo (in_array($data['event']->Status, ['Accepted', 'Advanced', 'Confirmed', 'FullPaid', 'Completed']) ? 'completed' : ''); ?>">
                                        <i class="fas <?php echo (in_array($data['event']->Status, ['Accepted', 'Advanced', 'FullPaid', 'Completed']) ? 'fa-regular fa-circle-check' : 'fa-solid fa-spinner fa-pulse'); ?>"></i> Event Confirmed
                                    </div>

                                    <!-- Advance Payment Completed -->
                                    <div class="status-item <?php echo (in_array($data['event']->Status, ['Advanced', 'Confirmed', 'FullPaid', 'Completed']) ? 'completed' : ''); ?>">
                                        <i class="fas <?php echo (in_array($data['event']->Status, ['Advanced', 'FullPaid', 'Completed']) ? 'fa-regular fa-circle-check' : 'fa-solid fa-spinner fa-pulse'); ?>"></i> Advance Payment completed
                                    </div>

                                    <!-- Full Payment Completed -->
                                    <div class="status-item <?php echo (in_array($data['event']->Status, ['FullPaid', 'Completed']) ? 'completed' : ''); ?>">
                                        <i class="fas <?php echo (in_array($data['event']->Status, ['FullPaid', 'Completed']) ? 'fa-check-circle' : 'fa-solid fa-spinner fa-pulse'); ?>"></i> Full Payment completed
                                    </div>

                                    <!-- Order Completed -->
                                    <div class="status-item <?php echo ($data['event']->Status == 'Completed' ? 'completed' : ''); ?>">
                                        <i class="fas <?php echo ($data['event']->Status == 'Completed' ? 'fa-check-circle' : 'fa-solid fa-spinner fa-pulse'); ?>"></i> Order Completed
                                    </div>
                                </div>
                            <?php if($data['event']->Status == 'Completed'){ ?>
                                <div class="feedback-btn-container">
                                    <button class="feedback-btn"><a href="<?php echo URLROOT ?>/feedbacks/submitFeedback" style="font-weight:normal">Share your thoughts</a></button>     
                                </div>   
                            <?php } ?>
                        </div>


                    <div class="status-container-2">
                        <div class="event-details-container">
                            <h3>Event Details</h3>
                            <div class="event-details-item">
                                <p class="details"><b>Event ID :</b> <?php echo $data['event']->EventID ?></p>
                                <p class="details"><b>Event Date :</b> <?php echo $data['event']->EventDate ?></p>
                                <p class="details"><b>Start Time :</b> <?php echo $data['event']->StartTime ?></p>
                                <p class="details"><b>End Time :</b> <?php echo $data['event']->EndTime ?></p>
                                <p class="details"><b>Event Location :</b> <?php echo $data['event']->Location ?></p>
                                <?php if(isset($data['event']->PhotographerID)){ ?>
                                    <p class="details"><b>Photographer :</b> <?php echo $data['photographer']->FirstName . ' '. $data['photographer']->LastName?></p>
                                    <?php if($data['photographerAction']->Action == 'Declined'){ ?>
                                        <div class="form-group">
                                            <label for="photographer"><b>Reselect Photographer:</b></label>

                                            <select name="photographer" id="photographer" required>
                                                <option value="">Select a photographer</option>
                                                <?php foreach ($data['photographers'] as $photographer) : ?>
                                                    <option value="<?php echo $photographer->UserID; ?>"><?php echo $photographer->FirstName . ' ' . $photographer->LastName; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <button type="button" class="button reallocate-button" data-partner-type="3" data-partner-type-name="photographer">Reselect</button>
                                        </div>
                                    <?php } ?>

                                </div>

                                <?php } ?>

                            </div>
                        </div>
                    </div>    

                        <div class="payment-container">

                                <div class="payment-header">
                                    <div class="payment-header-icon">
                                    <img class="logo" src="<?php echo URLROOT ?>/images/logo.png"></div>
                                    <div class="payment-header-title">Payment Summary</div>
                                </div>
                                    
                                <div class="payment-content">
                                            <?php
                                            if ($data['event']->Status == 'Accepted') { 
                                                echo '<p class="details"> Total Budget Confirmed : ' . $data['event']->TotalBudget . '</p>';
                                                $advancedPayment = $data['event']->TotalBudget*0.1;
                                                echo '<p class="details"> Advanced Payment : ' . $advancedPayment . '</p>';
                                                echo '<p class="details"><i class="fas fa-exclamation-circle" style="color: red;"></i><strong> Please pay the advanced payment.</strong> </p>';
                                                echo '<a href="' . URLROOT . '/payments/makePayment/' . $data['event']->EventID . '" ><button class="make-payment-btn"><b>Make Payment</b></button></a>';

                                            } else if($data['event']->Status == 'Advanced'){
                                                echo '<p class="details"> Total Budget Confirmed : ' . $data['event']->TotalBudget . '</p>';
                                                $advancedPayment = $data['event']->TotalBudget*0.1;
                                                $remainingPayment = $data['event']->TotalBudget - $advancedPayment;
                                                $date = date('Y-m-d', strtotime($data['event']->EventDate . ' - 7 days'));
                                                echo '<p class="details"> Advanced Payment : ' . $advancedPayment . ' <i class="fas fa-check-circle" style="color: orange;"></i> </p>';
                                                echo '<P class="details"> Remaining Payment : ' . $remainingPayment . '</p>';
                                                echo '<p class="details"><i class="fas fa-exclamation-circle" style="color: red;"></i><strong> Please pay the full payment before ' . $date  . '</strong> </p>';
                                                echo '<a href="' . URLROOT . '/payments/makePayment/' . $data['event']->EventID . '" ><button class="make-payment-btn"><b>Make Payment</b></button></a>';

                                            } else if($data['event']->Status == 'FullPaid'){
                                                echo '<p class="details"> Total Budget Confirmed : ' . $data['event']->TotalBudget . '</p>';
                                                $advancedPayment = $data['event']->TotalBudget*0.1;
                                                $remainingPayment = $data['event']->TotalBudget - $advancedPayment;
                                                echo '<p class="details"> Advanced Payment : ' . $advancedPayment . ' <i class="fas fa-check-circle" style="color: orange;"></i> </p>';
                                                echo '<P class="details"> Remaining Payment : ' . $remainingPayment . '<i class="fas fa-check-circle" style="color: green;"></i> </p>';
                                                echo '<p class="details"><b> Fully Paid </b></p>';
                                            } else if($data['event']->Status == 'Canceled'){
                                                echo '<p class="details"> Total Budget Confirmed : ' . $data['event']->TotalBudget . '</p>';
                                                echo '<p class="details"><b> Canceled </b></p>';
                                            } else if($data['event']->Status == 'Pencil'){
                                                echo '<p class="details"> Total Budget Predicted : ' . $data['event']->TotalBudget . '</p>';
                                                echo '<p class="details"><b> Yet to confirm the event </b></p>';
                                            } else if($data['event']->Status == 'Completed'){
                                                echo '<p class="details"> Total Budget Confirmed : ' . $data['event']->TotalBudget . '</p>';
                                                $advancedPayment = $data['event']->TotalBudget*0.1;
                                                $remainingPayment = $data['event']->TotalBudget - $advancedPayment;
                                                echo '<p class="details"> Advanced Payment : ' . $advancedPayment . ' <i class="fas fa-check-circle" style="color: orange;"></i> </p>';
                                                echo '<P class="details"> Remaining Payment : ' . $remainingPayment . ' <i class="fas fa-check-circle" style="color: green;"></i>  </p>';
                                                echo '<p class="details"><b> Fully Paid </b></p>';
                                            }

                                            ?>
                                            <div class="can-res-buttons">
                                            <?php if($data['event']->Status != 'Completed' && $data['event']->Status != 'Canceled'){ ?>
                                                <div><a href="#" onclick="confirmCancel('<?php echo URLROOT ?>/events/updateEventStatus/<?php echo $data['event']->EventID ?>/Canceled')"><button class="make-payment-btn"><b>Cancel Request</b></button></a></div>
                                                <?php
                                                    $eventDate = new DateTime($data['event']->EventDate);
                                                    $today = new DateTime();
                                                    $daysDifference = $today->diff($eventDate)->days;

                                                    if ($daysDifference > 3) {
                                                        // Display the reschedule button
                                                        echo '<div><a href="' . URLROOT . '/reschedules/reschedule/' . $data['event']->EventID . '"><button class="make-payment-btn"><b>Reschedule Request</b></button></a></div>';
                                                    } else {
                                                        // Display a message or hide the button
                                                        echo '<p class="details">Rescheduling is unavailable <br>(within 3 days of the event)</p>';
                                                    }
                                                ?>
                                            <?php } ?>
                                            
                                </div>
                        </div>        
                </div>
                    

    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Reallocate partners
            $('.reallocate-button').on('click', function (e) {
                e.preventDefault();

                SweetAlert.fire({
                    title: 'Are you sure?',
                    text: 'You are about to reselect the partner. Do you want to proceed?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, reselect him!'
                }).then((result) => {
                    if (result.isConfirmed) {
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
                            if (data.success) {
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Partner reallocated successfully.',
                                    icon: 'success',
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Failed to reallocate the partner.',
                                    icon: 'error',
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                        console.log('Reallocate the partner');
                        window.location.reload();
                    }
                });

            });
        });

        function openForm() {
        document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
        document.getElementById("myForm").style.display = "none";
        }

        function confirmCancel(cancelUrl) {
            let message = '';
            if ('<?php echo $data['event']->Status ?>' === 'Advanced') {
                message = "Your advanced payment won't be refunded. Are you sure you want to cancel?";
            } else if ('<?php echo $data['event']->Status ?>' === 'FullPaid') {
                message = "You will receive only 50% refund of the full payment. Are you sure you want to cancel?";
            } else {
                message = "Are you sure you want to cancel this event?";
            }

            Swal.fire({
                title: 'Are you sure?',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = cancelUrl;
                }
            });
        }

    </script>
</body>

</html>
