<!-- sampleview.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample View</title>
</head>
<body>
    <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
    <div class="home">
    <h1>Sample View</h1>

    <?php if ($data['sample']) : ?>
        <h2><?php echo $data['sample']->SampleName; ?></h2>
        <p>Description: <?php echo $data['sample']->Description; ?></p>
        <p>Date: <?php echo $data['sample']->Date; ?></p>
        <img src="<?php echo URLROOT ?>/<?php echo $data['sample']->CoverImagePath; ?>" alt="Cover Image" width="300">

        <h3>Sample Images:</h3>
        <div class="sample-images">
            <?php foreach ($data['images'] as $image) : ?>
                <img src="<?php echo URLROOT ?>/<?php echo $image ?>" style="width:500px;height:600px;"/><br />'
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p>Sample not found.</p>
    <?php endif; ?>

    </div>

</body>
</html>
