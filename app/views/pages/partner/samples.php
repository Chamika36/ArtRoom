<head>
    <title>Samples</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/cards.css">

    <style>
         .card {
    
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    max-width: fit-content;
    max-height: fit-content;
    margin-top: 180px; /*make the change here 1st inorder to add new card*/
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    padding: 16px;
    text-align: center;
    background-color: #D4C5BE;
    margin-left: 14%;
    border-radius: 15px;
    transition: transform 0.2s, box-shadow 0.2s, background-color 0.2s; /* Add transitions for a smooth effect */

    
    &:hover {
        transform: scale(1.05); 
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.5); /* Change box shadow on hover */
        background-color: #FBD2C9; /* Change background color on hover */
    }

    </style>

</head>

<body>
    <?php include(APPROOT . '/views/include/partner-sidebar.php'); ?>
    
    <div class="home">
            <div class ="column">
                <?php foreach ($data['samples'] as $sample) : ?>
                    <div class="card">
                        <h2><?php echo $sample->SampleName ?></h2>
                        <div style="align:center;"><img src="<?php echo URLROOT ?>/images/samples/<?php echo $sample->ImagePath; ?>" alt="sample image"></div>
                        <p><?php echo $sample->Description; ?></p>
                        <p><?php echo $sample->Date; ?></p>
                        <!-- <div>
                            <button class="button"><a href="<?php echo URLROOT ?>/packages/edit/<?php echo $sample->SampleID; ?>">Edit Sample</a></button>
                            <form style="display: inline;" action="<?php echo URLROOT ?>/samples/delete/<?php echo $sample->SampleID; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete <?php echo $sample->SampleName ?> sample?');">
                                <input type="hidden" name="sample_id" value="<?php echo $sample->SampleID; ?>">
                                <input class="button" type="submit" value="Delete Sample">
                            </form>
                        </div> -->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>