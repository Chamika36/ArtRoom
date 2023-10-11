<head>
    <title>Packages</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/package.css">
</head>

<body>

    <div class="header">
        <?php include(APPROOT . '/views/include/navbar.php'); ?>
    </div>

    <div class="menu">
        <?php include('sidebar.php'); ?>
    </div>

    <div class="main">
        <ul>
            <?php foreach($data['packages'] as $package) : ?>
                <li>
                    <div class="card">
                        <h2><?php echo $package->Name ?></h2>
                        <h5><?php echo $package->Price; ?></h5>
                        <div class="fakeimg">Image</div>
                        <p><?php echo $package->Description; ?></p>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</body>