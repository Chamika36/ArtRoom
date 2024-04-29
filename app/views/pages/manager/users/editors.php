<!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Editor Details</title>
     <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/photographertable.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
             <h1>Editor Details</h1>

         </section>
         <section class="table__body">
             <table>
                 <thead>
                     <tr>
                     <th>Editor ID</th>
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

                 <?php foreach ($data['editors'] as $editor) : ?>
                    <tbody>
                     <tr>
                     <td><?php echo $editor->UserID; ?></td>
                        <td><?php echo $editor->FirstName; ?></td>
                        <td><?php echo $editor->LastName; ?></td>
                        <td><?php echo $editor->ContactNumber; ?></td>
                        <td><?php echo $editor->Email; ?></td>
                        <td><?php echo $editor->Specialization; ?></td>
                         


                        <td>
                            <a href="<?php echo URLROOT; ?>/users/edit/<?php echo $editor->UserID; ?>">
                                <i class="fas fa-pencil-alt edit-icon"></i> <!-- Edit icon -->
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo URLROOT; ?>/users/delete/<?php echo $editor->UserID; ?>" onclick="return confirm('Are you sure you want to delete <?php echo $editor->FirstName ?>');">
                                <i class="fas fa-trash-alt delete-icon"></i> <!-- Delete icon -->
                            </a>
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