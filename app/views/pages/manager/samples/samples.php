<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/packages.css">
    <title>Samples</title>
</head>
<body>

    <!--sidebar-->
    
    <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
     

    <div class="home">
        <div class="container">
        <?php foreach ($data['samples'] as $sample) : ?>
            <div class="item-container">
                <!-- <div class="img-container">
                    <img src="<?php //echo URLROOT ?>/images/samples/<?php echo $sample->ImagePath; ?>" alt="sample image">
                </div> -->

                <div class="img-container">
                <img src="<?php echo URLROOT ?>/images/samples/<?php echo $sample->ImagePath; ?>" alt="sample image">
                </div>

                <div class="body-container">
                <div class="overlay"></div>


                    <div class="event-info">
                        <p class="title"><?php echo $sample->SampleName ?></p>
                        <div class="separator"></div>
                            <p class="info">ArtRoom Photography</p>
                            

                            <div class="additional-info">
                                <p class="info">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?php echo $sample->Description; ?></p>
                                <p class="info description">    
                                    <?php echo $sample->Date; ?>
                                </p>
                
                            </div>
                    </div>
                    <button class="action"><a href="<?php echo URLROOT ?>/samples/edit/<?php echo $sample->SampleID; ?>">Edit</a></button>
                    <form style="display: inline;" action="<?php echo URLROOT ?>/samples/delete/<?php echo $sample->SampleID; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete <?php echo $sample->Name ?> sample?');">
                        <input type="hidden" name="package_id" value="<?php echo $sample->SampleID; ?>">
                        <input class="button" type="submit" value="Delete Sample">
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="item-container">
                <div class="img-container">
                    <img src="https://static.vecteezy.com/system/resources/previews/000/554/223/original/plus-sign-vector-icon.jpg" alt="Event image">
                </div>

                <!-- <div class="body-container">
                    <div class="overlay"></div>
                    <button class="action"><a href="<!?php echo URLROOT ?>/samples/add ?>">Add New Sample</a></button>
                    
                </div> -->
            </div>

        </div>
    </div>
</body>
</html>