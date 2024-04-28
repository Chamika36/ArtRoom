<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-navbar.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/viewPhotographers.css">
    <title>Photographers</title>
</head>
<body>
    <div class="nav-container">
        <div id="header" class="background_pic">
            <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
        </div>

    </div>

    <section>
        <div class="sec-grid">
        <?php foreach ($data['photographers'] as $photographers) : ?>
            <a href="<?php echo URLROOT; ?>/users/viewPhotographer/<?php echo $photographers->UserID; ?>">
                <div class="profile-card">
                    <img id="profilePicture" src="data:image/jpeg;base64,<?php echo base64_encode($photographers->ProfilePicture) ?>" alt="" class="im">
                    <h1><?php echo $photographers->FirstName; ?></br> <?php echo $photographers->LastName; ?></h1>
                    <h4>About</h4>
                    <p><?php echo $photographers->Bio; ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    </section>

</body>

</html>