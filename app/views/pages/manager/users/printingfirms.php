<head>
    <title>Printing Firms</title>
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
                    <th>Printing Firms ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Orders</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <?php foreach ($data['printingFirms'] as $printingfirm) : ?>
                    <tbody>
                        <td><?php echo $printingfirm->UserID; ?></td>
                        <td><?php echo $printingfirm->FirstName; ?></td>
                        <td><?php echo $printingfirm->LastName; ?></td>
                        <td><?php echo $printingfirm->ContactNumber; ?></td>
                        <td><?php echo $printingfirm->Email; ?></td>
                        <td><a href="<?php echo URLROOT; ?>/users/getorders/<?php echo $printingfirm->UserID; ?>"><button class="button">Orders</button></a></td>
                        <td><a href="<?php echo URLROOT; ?>/users/edit/<?php echo $printingfirm->UserID; ?>"><button class="button">Edit</button></a></td>
                        <td><a href="<?php echo URLROOT; ?>/users/delete/<?php echo $printingfirm->UserID; ?>"><button class="button">Delete</button></a></td>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>