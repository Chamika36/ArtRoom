<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample View</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/view.css">
</head>
<body>

<?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>

<div class="container">
    <div class="sample-info">
        <h2><?php echo $data['sample']->SampleName; ?></h2>
       
        <p><?php echo $data['sample']->Description; ?></p>
        <p>Date: <?php echo $data['sample']->Date; ?></p>
    </div>
   
    
    <div class="sample-images">
        <?php foreach ($data['images'] as $image) : ?>
            <img src="<?php echo URLROOT ?>/<?php echo $image ?>" alt="Sample Image">
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
