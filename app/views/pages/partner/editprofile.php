<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I'm a Photographer</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>\css\partner\editprofile.css">
</head>
<body>
     <?php include(APPROOT . '/views/include/partner-sidebar.php'); ?>
     <div class="main">
        <form action="" method="POST">
            <div>
                <input type="text" name="FirstName" placeholder="Enter Firstname..."  value="<?php echo $data['partner']->FirstName?>">
                <input type="text" placeholder="Enter Secondname..."  value="<?php echo $data['partner']->LastName?>">
             </div>
             <div>
                <input type=" text" name="LastName" placeholder="Enter Email..." value="<?php echo $data['partner']->Email?>">
             </div>
             <div>
                <input type="text" name="ContactNumber" placeholder="Enter PhoneNo..." value="<?php echo $data['partner']->ContactNumber?>">
             </div>
             <div>
                <input type="text" name="Address" placeholder="Enter Address..." value="<?php echo $data['partner']->Address?>">
             </div>
                <input type="textarea"  name="Bio" placeholder="Enter Bio..." value="<?php echo $data['partner']->Bio?>">
             <div>
                <input type="submit">
             </div>
        </form>
     </div>

</body>
</html>