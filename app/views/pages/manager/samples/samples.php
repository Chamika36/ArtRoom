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
    
    <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
     

    <div class="home">
        

        <button class="add-package-btn" onclick="window.location.href='<?php echo URLROOT ?>/samples/add'">
            <i class="fas fa-plus"></i><b>  Add New Sample</b></button>

        <div class="container">
            <?php foreach ($data['samples'] as $sample) : ?>
            <div class="item-container">
                
                <div class="img-container">
                    <!-- Displaying the cover image of the sample -->
                    <img src="<?php echo URLROOT ?>/images/samples/<?php echo $sample->name ?>/<?php echo $sample->CoverImagePath; ?>" alt="Cover Image">
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
                    
                    <div class="button-container">
                        <button class="action edit-button" onclick="window.location.href='<?php echo URLROOT ?>/samples/edit/<?php echo $sample->SampleID; ?>'">Edit</button>
                    </div>

                    <!-- <div class="button-container">
                        <form style="display: inline;" action="<!?php echo URLROOT ?>/samples/delete/<!?php echo $sample->SampleID; ?>" method="POST" onsubmit="return confirmDelete();">
                            <input type="hidden" name="sample_id" value="<!?php echo $sample->SampleID; ?>">
                            <button class="action delete-button" type="submit">Delete</button>
                        </form>
                    </div> -->

                </div>
            </div>
            <?php endforeach; ?>
        
        </div>
        
    </div>
</body>
</html>

<script>
    function confirmDelete() {
        var sampleName = '<?php echo addslashes($sample->Name); ?>';
        return confirm('Are you sure you want to delete ' + sampleName + ' sample?');
    }
</script>