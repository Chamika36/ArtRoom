<!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title> Requests</title>
     <link rel="stylesheet" href="<?php echo URLROOT ?>\css\partner\events.css">
 </head>
 
 <body>
    <?php include(APPROOT . '/views/include/partner-sidebar.php'); ?>
    
    <div class="home">
     <main class="table" id="customers_table">

         <section class="table__header">
             <h1>Event Details</h1>

         </section>
         <section class="table__body">
            
             <table class="responsive-table">
                 <thead>
                     <tr>
                        <th>Event ID</th>
                        <th style="width: 15%;">Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>Details</th>
                        <th>Actions</th>
                     </tr>
                 </thead>

                    <tbody>
                    <?php foreach ($data['events'] as $event) : ?>
                     <tr>
                     <td style="text-align: center;" class="box"><?php echo $event->EventID; ?></td>
                        <td style="text-align: center;"><?php echo $event->EventDate; ?></td>
                        <td><?php echo $event->StartTime; ?></td>
                        <td><?php echo $event->Location; ?></td>
                        <td>
                        <a style="text-decoration: none;" href="<?php echo URLROOT ?>/partners/viewEvent/<?php echo $event->EventID?>"><p class="status shipped">View Details</p></a>
                        </td>
                        <td>
                        <?php if ($event->Action == 'Accepted') : ?>
                            <p class="status delivered">Accepted</p>
                        <?php elseif ($event->Action == 'Declined') : ?>
                            <p class="status cancelled">Declined</p>
                        <?php else : ?>
                            <a style="text-decoration: none;" href="<?php echo URLROOT ?>/partners/updatePartnerAction/<?php echo $_SESSION['user_type_id']?>/<?php echo $event->EventID?>/Accepted/Ok/"><p class="status do">Accept</p></a>
                            <a style="text-decoration: none;" href="<?php echo URLROOT ?>/partners/updatePartnerAction/<?php echo $_SESSION['user_type_id']?>/<?php echo $event->EventID?>/Declined/Busy/"><p class="status dont">Decline</p></a>
                        <?php endif; ?>
                        </td> 
                     </tr>
                     <?php endforeach; ?>
                 </tbody>
             </table>
         </section>
     </main>
    </div>
     <script src="script.js"></script>
 
 </body>
 
 </html>