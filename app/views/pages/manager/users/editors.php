<head>
    <title>Editors</title>
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
                    <th>Editor ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Specialization</th>
                    <th>Orders</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <?php foreach ($data['editors'] as $editor) : ?>
                    <tbody>
                        <td><?php echo $editor->UserID; ?></td>
                        <td><?php echo $editor->FirstName; ?></td>
                        <td><?php echo $editor->LastName; ?></td>
                        <td><?php echo $editor->ContactNumber; ?></td>
                        <td><?php echo $editor->Email; ?></td>
                        <td><?php echo $editor->Specialization; ?></td>
                        <td><a href="<?php echo URLROOT; ?>/users/getorders/<?php echo $editor->UserID; ?>"><button class="button">Orders</button></a></td>
                        <td><a href="<?php echo URLROOT; ?>/users/edit/<?php echo $editor->UserID; ?>"><button class="button">Edit</button></a></td>
                        <td><a href="<?php echo URLROOT; ?>/users/delete/<?php echo $editor->UserID; ?>"><button class="button">Delete</button></a></td>
                    </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>