<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/samples.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Samples</title>
</head>
<body>

    <!--sidebar-->
    
    <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
     

    <div class="home">
        

        <button class="add-package-btn" onclick="window.location.href='<?php echo URLROOT ?>/samples/add/0'">
            <i class="fas fa-plus"></i><b>  Add New Sample</b></button>

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
                    
                    <br>
                    
                    <div class="button-container">
                        <button class="action edit-button" onclick="window.location.href='<?php echo URLROOT ?>/samples/edit/<?php echo $sample->SampleID; ?>'">Edit</button>
                    </div>

                    <br>

                    <div class="button-container">
                        <button class="action delete-button" onclick="confirmDelete('<?php echo URLROOT ?>/samples/delete/<?php echo $sample->SampleID; ?>','<?php echo $sample->SampleName?>')">Delete</button>
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
    function confirmDelete(deleteUrl,sampleName) {
        Swal.fire({
            title: 'Are you sure?',
            text: `You are about to delete the ${sampleName} sample !`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Your sample has been deleted.',
                    icon: 'success',
                    timer: 1500
                });
                window.location.href = deleteUrl;
            }
        });
    }

</script>
