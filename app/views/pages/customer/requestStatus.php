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
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/payment-page.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />


</head>
    <body>
            <div>
                <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
            </div>
            
                
                <h2 class="rescheduleRequest">Status of the Request</h2>

                <div class="container">

                            <div class="status-container">
                                
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

                            <div class="payment-container">
                                <?php
                                if ($data['event']->Status == 'Accepted') { 
                                    echo '<p> Total Budget Confirmed : ' . $data['event']->TotalBudget . '</p>';
                                    $advancedPayment = $data['event']->TotalBudget*0.1;
                                    echo '<p> Advanced Payment : ' . $advancedPayment . '</p>';
                                    echo '<a href="' . URLROOT . '/payments/makePayment/' . $data['event']->EventID . '"><button><b>Make Payment</b></button></a>';
                                } else if($data['event']->Status == 'Advanced'){
                                    echo '<p> Total Budget Confirmed : ' . $data['event']->TotalBudget . '</p>';
                                    $advancedPayment = $data['event']->TotalBudget*0.1;
                                    $remainingPayment = $data['event']->TotalBudget - $advancedPayment;
                                    echo '<p> Advanced Payment : ' . $advancedPayment . ' *paid </p>';
                                    echo '<P> Remaining Payment : ' . $remainingPayment . '</p>';
                                    echo '<a href="' . URLROOT . '/payments/makePayment/' . $data['event']->EventID . '"><button><b>Make Payment</b></button></a>';
                                } else if($data['event']->Status == 'FullPaid'){
                                    echo '<p> Total Budget Confirmed : ' . $data['event']->TotalBudget . '</p>';
                                    $advancedPayment = $data['event']->TotalBudget*0.1;
                                    $remainingPayment = $data['event']->TotalBudget - $advancedPayment;
                                    echo '<p> Advanced Payment : ' . $advancedPayment . ' *paid </p>';
                                    echo '<P> Remaining Payment : ' . $remainingPayment . ' *paid </p>';
                                    echo '<p> Fully Paid </p>';
                                } else if($data['event']->Status == 'Canceled'){
                                    echo '<p> Total Budget Confirmed : ' . $data['event']->TotalBudget . '</p>';
                                    echo '<p> Canceled </p>';
                                } else if($data['event']->Status == 'Pencil'){
                                    echo '<p> Total Budget Predicted : ' . $data['event']->TotalBudget . '</p>';
                                    echo '<p> Yet to confirm the event </p>';
                                }

                                ?>
                                <a href="<?php echo URLROOT ?>/events/updateEventStatus/<?php echo $data['event']->EventID ?>/Canceled"><button><b>Cancel Request</b></button></a>
                                <a href="<?php echo URLROOT ?>/events/rescheduleRequest/<?php echo $data['event']->EventID ?>"><button><b>Reschedule Request</b></button></a>
                            </div>
                </div>
                    
                
            
    </body>

</html>
