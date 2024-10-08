<!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <title>Customers</title>
     <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/photographertable.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
 </head>
<body>
    <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>

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
                    <!-- <th>Orders</th> -->
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
                        


                        <td>
                            <a href="<?php echo URLROOT; ?>/users/edit/<?php echo $customer->UserID; ?>">
                                <i class="fas fa-pencil-alt edit-icon"></i> <!-- Edit icon -->
                            </a>
                        </td>
                        <td>
                             <a href="<?php echo URLROOT; ?>/users/delete/<?php echo $customer->UserID; ?>" onclick="return confirm('Are you sure you want to delete <!?php echo $photographer->FirstName ?>');">
                                <i class="fas fa-trash-alt delete-icon"></i> <!-- Delete icon -->
                            </a>
                        </td>



                    </tbody>
                <?php endforeach; ?>
            </table>
            </section>
        </main>
    </div>
</body>
