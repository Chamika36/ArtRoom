<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/packages.css">
    <title>Packages</title>
</head>
<body>

    <!--sidebar
    <!-- <div id="menu"> -->
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
    <!-- </div>--> -->
    <div class="home">
        <div class="container">
        <?php foreach ($data['packages'] as $package) : ?>
            <div class="item-container">
                <div class="img-container">
                    <img src="https://evertale.lk/wp-content/uploads/2022/11/274587332_4603337946444852_9067674197972451056_n-e1668319668755-770x770.jpg" alt="Event image">
                </div>

                <div class="body-container">
                    <div class="overlay"></div>

                    <div class="event-info">
                        <p class="title"><?php echo $package->Name ?></p>
                        <div class="separator"></div>
                            <!--<p class="info">Bellmore, NY</p>-->
                            <p class="price">Rs. <?php echo $package->Price; ?></p>

                            <div class="additional-info">
                                <p class="info">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?php echo $package->Description; ?>
                                </p>
                                <p class="info description">
                                <?php echo $package->ServicesIncluded; ?>
                                </p>
                            </div>
                    </div>
                    <button class="action"><a href="<?php echo URLROOT ?>/packages/edit/<?php echo $package->PackageID; ?>">Edit</a></button>
                    <form style="display: inline;" action="<?php echo URLROOT ?>/packages/delete/<?php echo $package->PackageID; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete <?php echo $package->Name ?> package?');">
                        <input type="hidden" name="package_id" value="<?php echo $package->PackageID; ?>">
                        <input class="button" type="submit" value="Delete Package">
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="item-container">
                <div class="img-container">
                    <img src="https://evertale.lk/wp-content/uploads/2022/11/274587332_4603337946444852_9067674197972451056_n-e1668319668755-770x770.jpg" alt="Event image">
                </div>

                <div class="body-container">
                    <div class="overlay"></div>
                    <button class="action"><a href="<?php echo URLROOT ?>/packages/add ?>">Add New Package</a></button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
</html>



<!--<head>
    <title>Packages</title>
</head>

<body>
    <div class="container">
        <div id="menu">
             Sidebar 
            <!?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        </div>

        <div id="main">
            <div class ="column">
                <!?php foreach ($data['packages'] as $package) : ?>
                    <div class="card">
                        <h2><!?php echo $package->Name ?></h2>
                        <h3>Rs. <!?php echo $package->Price; ?></h3>
                        <p><!?php echo $package->Description; ?></p>
                        <p><!?php echo $package->ServicesIncluded; ?></p>
                        <div>
                            <button class="button"><a href="<!?php echo URLROOT ?>/packages/edit/<!?php echo $package->PackageID; ?>">Edit Package</a></button>
                            <form style="display: inline;" action="<!?php echo URLROOT ?>/packages/delete/<!?php echo $package->PackageID; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete <?php echo $package->Name ?> package?');">
                                <input type="hidden" name="package_id" value="<!?php echo $package->PackageID; ?>">
                                <input class="button" type="submit" value="Delete Package">
                            </form>
                        </div>
                    </div>
                <!?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
                -->