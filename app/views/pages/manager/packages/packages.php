<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/package.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Packages</title>
</head>
<body>

    <!--sidebar-->
    
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
     
    <!-- <div class="home">
        <div class="container"></div>
        <!?php foreach ($data['packages'] as $package) : ?>
            <div class="item-container">
                <div class="img-container">
                    <img src="https://evertale.lk/wp-content/uploads/2022/11/274587332_4603337946444852_9067674197972451056_n-e1668319668755-770x770.jpg" alt="Event image">
                </div>

                <div class="body-container">
                    <div class="overlay"></div>

                    /p>-->
                            <!--<p class="price">Rs. <!?php echo $package->Price; ?></p>

                            <div class="additional-info">
                                <p class="info">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <!?php echo $package->Description; ?>
                                </p><div class="event-info">
                        <p class="title"><centre><!?php echo $package->Name ?></centre></p>
                        <div class="separator"></div>-->
                            <!--<p class="info">Bellmore, NY<
                                <p class="info description">
                                <!?php echo $package->ServicesIncluded; ?>
                                </p>
                            </div>
                    </div>
                    <button class="action"><a href="<!?php echo URLROOT ?>/packages/edit/<!?php echo $package->PackageID; ?>">Edit</a></button>
                    <form style="display: inline;" action="<!?php echo URLROOT ?>/packages/delete/<!?php echo $package->PackageID; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete <!?php echo $package->Name ?> package?');">
                        <input type="hidden" name="package_id" value="<!?php echo $package->PackageID; ?>">
                        <input class="button" type="submit" value="Delete Package">
                    </form>
                </div>
            </div>
        <!?php endforeach; ?>
        <div class="item-container">
                <div class="img-container">
                    <img src="https://evertale.lk/wp-content/uploads/2022/11/274587332_4603337946444852_9067674197972451056_n-e1668319668755-770x770.jpg" alt="Event image">
                </div>

                <div class="body-container">
                    <div class="overlay"></div>
                    <button class="action"><a href="<!?php echo URLROOT ?>/packages/add ?>">Add New Package</a></button>
                    
                </div>
            </div>

        </div>
    </div>
</body>
</html>
 -->


        <div class="home">
        <div class="container">
            
        <button class="add-package-btn" onclick="window.location.href='<?php echo URLROOT ?>/packages/add'">
            <i class="fas fa-plus"></i><b>  Add New Package</b></button>


        <!-- <div class="packages-container">
            <div class="package">
                <div class="package-preview">
                    <img src="https://evertale.lk/wp-content/uploads/2022/11/274587332_4603337946444852_9067674197972451056_n-e1668319668755-770x770.jpg" alt="Event image">
                </div>

                <div class="body-container">
                    <div class="overlay"></div>
                    <button class="action"><a href="<!?php echo URLROOT ?>/packages/add ?>">Add New Package</a></button>
                    
                </div>
            </div> -->


        <div class="packages-container">
            <?php foreach ($data['packages'] as $package) : ?>
            <div class="package">
                <div class="package-preview">
                    <h6>Package</h6>
                    <h2><?php echo $package->Name ?></h2>
                </div>
                
                <div class="package-info">
                    <h4><?php echo $package->ServicesIncluded; ?></h4></br>
                    <h3>Rs. <?php echo $package->Price; ?></h3>
                    
                    <button class="btn" onclick="window.location.href='<?php echo URLROOT ?>/packages/edit/<?php echo $package->PackageID; ?>'">Edit</button>

                    <form style="display: inline;" action="<!?php echo URLROOT ?>/packages/delete/<!?php echo $package->PackageID; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete <?php echo $package->Name ?> package?');">
                                <input type="hidden" name="package_id" value="<!?php echo $package->PackageID; ?>">
                                <input class="btn1" type="submit" value="Delete">
                    </form>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        </body>
</html>


