<!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Printing Firms Details</title>
     <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/photographertable.css">
 </head>
 
 <body>
        <div id="menu">
            <!-- Sidebar -->
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        </div>

     <main class="table" id="customers_table">
         <section class="table__header">
             <h1>Printing Firms Details</h1>

         </section>
         <section class="table__body">
             <table>
                 <thead>
                     <tr>
                     <th>Printing Firms ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Orders</th>
                    <th>Edit</th>
                    <th>Delete</th>
                     </tr>
                 </thead>

                 <?php foreach ($data['printingFirms'] as $printingfirm) : ?>
                    <tbody>
                     <tr>
                     <td><?php echo $printingfirm->UserID; ?></td>
                        <td><?php echo $printingfirm->FirstName; ?></td>
                        <td><?php echo $printingfirm->LastName; ?></td>
                        <td><?php echo $printingfirm->ContactNumber; ?></td>
                        <td><?php echo $printingfirm->Email; ?></td>
                        <td>
                        <a href="<?php echo URLROOT; ?>/users/getorders/<?php echo $printingfirm->UserID; ?>"><p class="status delivered"><b>Orders</b></p></a>
                        </td>
                        <td>
                        <a href="<?php echo URLROOT; ?>/users/edit/<?php echo $printingfirm->UserID; ?>"><p class="status shipped"><b>Edit</b></p></a>
                        </td>
                        <td>
                        <a href="<?php echo URLROOT; ?>/users/delete/<?php echo $printingfirm->UserID; ?>"><p class="status cancelled"><b>Delete</b></p></a>
                        </td> 
                     </tr>
                 </tbody>
                 <?php endforeach; ?>
             </table>
         </section>
     </main>
     <script src="script.js"></script>
 
 </body>
 
 </html>