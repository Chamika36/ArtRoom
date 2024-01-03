<head>
    <title>Photographers</title>
</head>

<body>
    <div class="container">
        <div id="menu">
            <!-- Sidebar -->
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        </div>
        <!-- <div id="menu">
            <//?php include('sidebar.php'); ?>
        </div> -->

        <div id="main">
            <table class="table">
                <thead>
                    <th>Photographer ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Specialization</th>
                    <th>Orders</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <?php foreach ($data['photographers'] as $photographer) : ?>
                    <tbody>
                        <td><?php echo $photographer->UserID; ?></td>
                        <td><?php echo $photographer->FirstName; ?></td>
                        <td><?php echo $photographer->LastName; ?></td>
                        <td><?php echo $photographer->ContactNumber; ?></td>
                        <td><?php echo $photographer->Email; ?></td>
                        <td><?php echo $photographer->Specialization; ?></td>
                        <td><a href="<?php echo URLROOT; ?>/users/getorders/<?php echo $photographer->UserID; ?>"><button class="button">Orders</button></a></td>
                        <td><a href="<?php echo URLROOT; ?>/users/edit/<?php echo $photographer->UserID; ?>"><button class="button">Edit</button></a></td>
                        <td><a href="<?php echo URLROOT; ?>/users/delete/<?php echo $photographer->UserID; ?>"><button class="button" onsubmit="return confirm('Are you sure you want to delete <?php echo $photographer->FirstName ?>');">Delete</button></a></td>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>