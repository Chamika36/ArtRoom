<!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Photographer Details</title>
     <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/photographertable.css">
 </head>
 
 <body>
        <!-- <div id="menu"> -->
            <!-- Sidebar -->
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        <!-- </div> -->

    <div class="home">

     <main class="table" id="customers_table">
         <section class="table__header">
             <h1>Photographer Details</h1>

         </section>
         <section class="table__body">
             <table>
                 <thead>
                     <tr>
                        <th> ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Specialization</th>
                        <!-- <th>Orders</th> -->
                        <th>Edit</th>
                        <th>Delete</th>
                     </tr>
                 </thead>

                 <?php foreach ($data['photographers'] as $photographer) : ?>
                    <tbody>
                     <tr>
                        <td><?php echo $photographer->UserID; ?></td>
                        <td><?php echo $photographer->FirstName; ?></td>
                        <td><?php echo $photographer->LastName; ?></td>
                        <td><?php echo $photographer->ContactNumber; ?></td>
                        <td><?php echo $photographer->Email; ?></td>
                        <td><?php echo $photographer->Specialization; ?></td> 
                        <!-- <td>
                        <a href="<?php// echo URLROOT; ?>/users/getorders/<?php echo// $photographer->UserID; ?>"><p class="status delivered">Orders</p></a>
                        </td> -->
                        <td>
                        <a href="<?php echo URLROOT; ?>/users/edit/<?php echo $photographer->UserID; ?>"><p class="status shipped">Edit</p></a>
                        </td>
                        <td>
                        <a href="<?php echo URLROOT; ?>/users/delete/<?php echo $photographer->UserID; ?>"><p class="status cancelled" onsubmit="return confirm('Are you sure you want to delete <?php echo $photographer->FirstName ?>');">Delete</p></a>
                        </td> 
                     </tr>
                 </tbody>
                 <?php endforeach; ?>
             </table>
         </section>
     </main>
     </div>
     <script src="script.js"></script>
 
 </body>
 
 </html>