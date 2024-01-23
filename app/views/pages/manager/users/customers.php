
<!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Customers</title>
     <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/photographertable.css">
 </head>
 
 <body>
        <div id="menu">
            <!-- Sidebar -->
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        </div>

     <main class="table" id="customers_table">
         <section class="table__header">
             <h1>Customer Details</h1>

         </section>
         <section class="table__body">
             <table>
                 <thead>
                     <tr>
                        <th>Customer ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Orders</th>
                        <th>Edit</th>
                        <th>Delete</th>
                     </tr>
                 </thead>

                 <?php foreach ($data['customers'] as $customer) : ?>
                    <tbody>
                     <tr>
                     <td><?php echo $customer->UserID; ?></td>
                        <td><?php echo $customer->FirstName; ?></td>
                        <td><?php echo $customer->LastName; ?></td>
                        <td><?php echo $customer->ContactNumber; ?></td>
                        <td><?php echo $customer->Email; ?></td> 
                        <td>
                        <a href="<?php echo URLROOT; ?>/users/getorders/<?php echo $customer->UserID; ?>"><p class="status delivered">Orders</p></a>
                        </td>
                        <td>
                        <a href="<?php echo URLROOT; ?>/users/edit/<?php echo $customer->UserID; ?>">Edit</p></a>
                        </td>
                        <td>
                        <a href="<?php echo URLROOT; ?>/users/delete/<?php echo $customer->UserID; ?>"><p class="status cancelled" onsubmit="return confirm('Are you sure you want to delete <?php echo $customer->FirstName ?>');">Delete</p></a>
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