<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/samples.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-navbar.css">
    <title>Samples</title>
</head>
<body>



<div class="home">
    
        <div class="nav-container">
            <div id="header" class="background_pic">
                <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
            </div>

        </div>
        
    <div class="container">
    
            <?php foreach ($data['samples'] as $sample) : ?>
             
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
                                <p class="info description">    
                                    <?php echo $sample->Date; ?>
                                </p>
                            </div>
                    
                    

                    <div class="button-container">
                        <button class="action view-button" onclick="window.location.href='<?php echo URLROOT ?>/samples/viewSample/<?php echo $sample->SampleID; ?>'">View</button>
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

<script>
function confirmDelete(deleteUrl) {
    // Ask user to confirm deletion
    var confirmation = confirm("Are you sure you want to delete this sample? This action cannot be undone.");
    if (confirmation) {
        window.location.href = deleteUrl;
    }
}
</script>
