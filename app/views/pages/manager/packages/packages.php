<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/package.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Packages</title>
</head>
<body>

    <!--sidebar-->
    
        <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        
        <div class="home">
        <div class="container">
            
        <button class="add-package-btn" onclick="window.location.href='<?php echo URLROOT ?>/packages/add'">
            <i class="fas fa-plus"></i><b>  Add New Package</b></button>

        <div class="packages-container">
            <?php foreach ($data['packages'] as $package) : ?>
            <div class="package">
                <div class="package-preview">
                    <h6>Package</h6>
                    <h2><?php echo $package->Name ?></h2>
                </div>
                
                <div class="package-info">
                    <h4><?php echo $package->ServicesIncluded; ?></h4></br>
                    <h3>Rs. <?php echo $package->Price; ?></h3>
                    
                    <button class="btn" onclick="window.location.href='<?php echo URLROOT ?>/packages/edit/<?php echo $package->PackageID; ?>'">Edit</button>

                    <button class="btn1" onclick="confirmDelete('<?php echo $package->Name; ?>', '<?php echo $package->PackageID; ?>' , '<?php echo $package->Selected; ?>')">Delete</button>

                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <script>
            function confirmDelete(packageName, packageID, selected) {
                if (selected == 1) {
                    Swal.fire({
                        title: "Cannot Delete",
                        text: `The ${packageName} package is currently selected and cannot be deleted.`,
                        icon: "error"
                    });
                } else {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You are about to delete the ${packageName} package.`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to delete URL
                            window.location.href = `<?php echo URLROOT ?>/packages/delete/${packageID}`;
                        } else {
                            Swal.fire({
                                title: "Cancelled!",
                                text: "Your package is not deleted.",
                                icon: "error"
                            });
                        }
                    });
                }
            }
        </script>

        
        </body>
</html>


