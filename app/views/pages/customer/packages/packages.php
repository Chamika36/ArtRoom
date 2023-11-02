<head>
    <title>Packages</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/cards.css">
</head>

<body>
    <div class="">
        <div id="header">
            <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
        </div>

        <div id="main">
            <div class ="column">
                <?php foreach ($data['packages'] as $package) : ?>
                    <div class="card">
                        <h2><?php echo $package->Name ?></h2>
                        <h3>Rs. <?php echo $package->Price; ?></h3>
                        <p><?php echo $package->Description; ?></p>
                        <p><?php echo $package->ServicesIncluded; ?></p>
                        <a href="<?php echo URLROOT ?>/events/request/<?php echo $package->PackageID; ?>"><button class="button">Select Package</button></a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>