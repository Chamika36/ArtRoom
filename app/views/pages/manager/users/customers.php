<head>
    <title>Customers</title>
</head>

<body>
    <div class="container">
        <div id="header">
            <?php include(APPROOT . '/views/include/navbar.php'); ?>
        </div>

        <div id="menu">
            <?php include('sidebar.php'); ?>
        </div>

        <div id="main">
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
                        <td><?php echo $customer->UserID; ?></td>
                        <td><?php echo $customer->FirstName; ?></td>
                        <td><?php echo $customer->LastName; ?></td>
                        <td><?php echo $customer->ContactNumber; ?></td>
                        <td><?php echo $customer->Email; ?></td>
                        <td><a href="<?php echo URLROOT; ?>/users/getorders/<?php echo $customer->UserID; ?>"><button class="button">Orders</button></a></td>
                        <td><a href="<?php echo URLROOT; ?>/users/edit/<?php echo $customer->UserID; ?>"><button class="button">Edit</button></a></td>
                        <td><a href="<?php echo URLROOT; ?>/users/delete/<?php echo $customer->UserID; ?>"><button class="button" onsubmit="return confirm('Are you sure you want to delete <?php echo $customer->FirstName ?>');">Delete</button></a></td>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>