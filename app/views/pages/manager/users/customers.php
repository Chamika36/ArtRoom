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
    <!-- <div class="container"> -->
        <!-- <div id="menu"> -->
            <!-- Sidebar -->
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        <!-- </div> -->

        <div class="home">
        <main class="table" id="customers_table">
            <section class="table__header">
                <h1>Customer Details</h1>

            </section>
            <section class="table__body">
            <table>
                <thead>
                    <th>Customer ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Orders</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <?php foreach ($data['customers'] as $customer) : ?>
                    <tbody>
                     <tr>
                     <td><?php echo $customer->UserID; ?></td>
                        <td><?php echo $customer->FirstName; ?></td>
                        <td><?php echo $customer->LastName; ?></td>
                        <td><?php echo $customer->ContactNumber; ?></td>
                        <td><?php echo $customer->Email; ?></td>
                        <td><a href="<?php echo URLROOT; ?>/users/getorders/<?php echo $customer->UserID; ?>"><p class="status delivered"><b>Orders</b></p></a></td>
                        <td><a href="<?php echo URLROOT; ?>/users/edit/<?php echo $customer->UserID; ?>"><p class="status shipped"><b>Edit</b></p></a></td>
                        <td><a href="<?php echo URLROOT; ?>/users/delete/<?php echo $customer->UserID; ?>"><p class="status cancelled"><b>Delete</b></p></a></td>
                    </tbody>
                <?php endforeach; ?>
            </table>
            </section>
        </main>
        </div>
    </div>
</body>
