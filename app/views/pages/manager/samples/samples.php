<head>
    <title>Samples</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/samples.css">
</head>

<body>
    <div class="container">
        <div id="menu">
            <!-- Sidebar -->
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        </div>

        <div id="main">
            <?php $sampleCount = count($data['samples']); ?>
            <?php for ($i = 0; $i < $sampleCount; $i += 2) : ?>
                <div class="row">
                    <?php for ($j = $i; $j < $i + 2 && $j < $sampleCount; $j++) : ?>
                        <div class="column">
                            <div class="card">
                                <h2><?php echo $data['samples'][$j]->SampleName ?></h2>
                                <div style="text-align:center;"><img src="<?php echo URLROOT ?>/images/samples/<?php echo $data['samples'][$j]->ImagePath; ?>" alt="sample image"></div>
                                <p><?php echo $data['samples'][$j]->Description; ?></p>
                                <p><?php echo $data['samples'][$j]->Date; ?></p>
                                <div>
                                    <button class="button"><a href="<?php echo URLROOT ?>/samples/edit/<?php echo $data['samples'][$j]->SampleID; ?>">Edit Sample</a></button>
                                    <form style="display: inline;" action="<?php echo URLROOT ?>/samples/delete/<?php echo $data['samples'][$j]->SampleID; ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete <?php echo $data['samples'][$j]->SampleName ?> sample?');">
                                        <input type="hidden" name="sample_id" value="<?php echo $data['samples'][$j]->SampleID; ?>">
                                        <input class="button" type="submit" value="Delete Sample">
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</body>
