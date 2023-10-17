<head>
    <title>Packages</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/package.css">
</head>

<body>
    <div class="container2">
        <div id="header2">
            <?php include(APPROOT . '/views/include/navbar.php'); ?>
        </div>

        <div id="menu">
                <?php include('sidebar.php'); ?>
        </div>

        <div id="main">
            <ul>
                <?php foreach ($data['packages'] as $package) : ?>
                    <li>
                        <div class="card">
                            <h2><?php echo $package->Name ?></h2>
                            <h5><?php echo $package->Price; ?></h5>
                            <div class="fakeimg">Image</div>
                            <p><?php echo $package->Description; ?></p>
                            <p><?php echo $package->ServicesIncluded; ?></p>
                            <a href="<?php echo URLROOT ?>/packages/edit/<?php echo $package->PackageID; ?>">Edit</a>
                            <form action="<?php echo URLROOT ?>/packages/delete/<?php echo $package->PackageID; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this package?');">
                                <input type="hidden" name="package_id" value="<?php echo $package->PackageID; ?>">
                                <input type="submit" value="Delete">
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>