<head>
    <title>Packages</title>
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
            <div class ="column">
                <?php foreach ($data['packages'] as $package) : ?>
                    <div class="card">
                        <h2><?php echo $package->Name ?></h2>
                        <h3>Rs. <?php echo $package->Price; ?></h3>
                        <p><?php echo $package->Description; ?></p>
                        <p><?php echo $package->ServicesIncluded; ?></p>
                        <div>
                            <button class="button"><a href="<?php echo URLROOT ?>/packages/edit/<?php echo $package->PackageID; ?>">Edit Package</a></button>
                            <form style="display: inline;" action="<?php echo URLROOT ?>/packages/delete/<?php echo $package->PackageID; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete <?php echo $package->Name ?> package?');">
                                <input type="hidden" name="package_id" value="<?php echo $package->PackageID; ?>">
                                <input class="button" type="submit" value="Delete Package">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>