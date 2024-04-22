<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/samples.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Samples</title>
</head>
<body>

    <!--sidebar-->
    
    <?php include(APPROOT . '/views/include/partner-sidebar.php'); ?>
     

    <div class="home">
        

        <div class="container">
            <?php foreach ($data['samples'] as $sample) : ?>
            <a href="<?php echo URLROOT ?>/samples/viewSample/<?php echo $sample->SampleID; ?>">  
            <div class="item-container">
                
                <div class="img-container">
                    <!-- Displaying the cover image of the sample -->
                    <img src="<?php echo URLROOT ?>/<?php echo $sample->CoverImagePath; ?>" alt="Cover Image">
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
                    

                </div>
            </div>
            </a>
            <?php endforeach; ?>
        
        </div>
        
    </div>
</body>
</html>

