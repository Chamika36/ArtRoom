<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event status</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-navbar.css">
    <link rel="stylesheet" href="../../../../public/css/grid.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/logo.css">
    <!-- <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-mainPages.css"> -->
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/payment-page.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />


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
                    <div class="status-container">
                        <div>
                                    <div class="status-item request-sent">
                                        <i class="fas fa-check-circle"></i> Request sent
                                    </div>
                                    
                                    <div class="status-item manager-accepted">
                                        <i class="fas fa-check-circle"></i> Manager accepted the Request
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
                                    
                                    <div class="status-item order-completed">
                                        <i class="fas fa-check-circle"></i> Order Completed
                                    </div>
                        </div>
                        <div class="feedback-btn-container">
                            <button class="feedback-btn"><a href="<?php echo URLROOT ?>/feedbacks/submitFeedback" style="font-weight:normal">Share your thoughts</a></button>     
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
                                            echo '<a href="' . URLROOT . '/payments/makePayment/' . $data['event']->EventID . '" ><button class="make-payment-btn"><b>Make Payment</b></button></a>';

                                        } else if($data['event']->Status == 'Advanced'){
                                            echo '<p class="details"> Total Budget Confirmed : ' . $data['event']->TotalBudget . '</p>';
                                            $advancedPayment = $data['event']->TotalBudget*0.1;
                                            $remainingPayment = $data['event']->TotalBudget - $advancedPayment;
                                            echo '<p class="details"> Advanced Payment : ' . $advancedPayment . ' *paid </p>';
                                            echo '<P class="details"> Remaining Payment : ' . $remainingPayment . '</p>';
                                            echo '<a href="' . URLROOT . '/payments/makePayment/' . $data['event']->EventID . '" ><button class="make-payment-btn"><b>Make Payment</b></button></a>';

                                        } else if($data['event']->Status == 'FullPaid'){
                                            echo '<p class="details"> Total Budget Confirmed : ' . $data['event']->TotalBudget . '</p>';
                                            $advancedPayment = $data['event']->TotalBudget*0.1;
                                            $remainingPayment = $data['event']->TotalBudget - $advancedPayment;
                                            echo '<p class="details"> Advanced Payment : ' . $advancedPayment . ' *paid </p>';
                                            echo '<P class="details"> Remaining Payment : ' . $remainingPayment . ' *paid </p>';
                                            echo '<p class="details"><b> Fully Paid </b></p>';
                                        } else if($data['event']->Status == 'Canceled'){
                                            echo '<p class="details"> Total Budget Confirmed : ' . $data['event']->TotalBudget . '</p>';
                                            echo '<p class="details"><b> Canceled </b></p>';
                                        } else if($data['event']->Status == 'Pencil'){
                                            echo '<p class="details"> Total Budget Predicted : ' . $data['event']->TotalBudget . '</p>';
                                            echo '<p class="details"><b> Yet to confirm the event </b></p>';
                                        }

                                        ?>
                                        <div class="can-res-buttons">
                                        <div><a href="<?php echo URLROOT ?>/events/updateEventStatus/<?php echo $data['event']->EventID ?>/Canceled"><button class="make-payment-btn"><b>Cancel Request</b></button></a></div>
                                        
                                        <div><a href="<?php echo URLROOT ?>/reschedules/reschedule/<?php echo $data['event']->EventID ?>"><button class="make-payment-btn"><b>Reschedule Request</b></button></a></div>
                                            
                                        </div>
                            </div>
                    </div>        
                </div>
                    
    </body>

    <script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</html>
