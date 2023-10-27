<head>
    <title>Samples</title>
</head>

<body>
    <div class="container">
        <div id="header">
            <?php include(APPROOT . '/views/include/navbar.php'); ?>
        </div>

        <div id="menu">
                <?php include('sidebar.php'); ?>
        </div>

        <div id="main">
            <div class ="column">
                <?php foreach ($data['samples'] as $sample) : ?>
                    <div class="card">
                        <h2><?php echo $sample->SampleName ?></h2>
                        <h3><?php echo $sample->ImagePath; ?></h3>
                        <div style="align:center;"><img src="<?php echo URLROOT ?>/images/samples/<?php echo $sample->ImagePath; ?>" alt="sample image"></div>
                        <p><?php echo $sample->Description; ?></p>
                        <p><?php echo $sample->Date; ?></p>
                        <div>
                            <button class="button"><a href="<?php echo URLROOT ?>/packages/edit/<?php echo $sample->SampleID; ?>">Edit Sample</a></button>
                            <form style="display: inline;" action="<?php echo URLROOT ?>/samples/delete/<?php echo $sample->SampleID; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete <?php echo $sample->SampleName ?> sample?');">
                                <input type="hidden" name="sample_id" value="<?php echo $sample->SampleID; ?>">
                                <input class="button" type="submit" value="Delete Sample">
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>