<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <title>Home</title>
</head>
<body>
    <?php include(APPROOT . '/views/include/partner-navbar.php'); ?>

    <div class="container bg-orange text-center text-brown p-3 mt-5 col-4" style="border-radius: 50px;">
        <div class="row">
            <div class="col">
                <label class="d-flex align-items-center justify-content-center" style="font-weight: bold; font-size: xx-large;">
                    <span class="mr-4" style="margin-right: 20px;">My Availability</span>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadio1" value="option1">
                        <label class="form-check-label" for="exampleRadio1">On</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadio2" value="option2">
                        <label class="form-check-label" for="exampleRadio2">Off</label>
                    </div>
                </label>
            </div>
        </div>
    </div>
    <div class="position-absolute top-0 end-0 d-flex justify-content-center align-items-center" style="margin-top: 310px; margin-right: 60px; width: 50px; height: 50px; background-color: #ff8c00; border-radius: 50%;">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
        </svg>
    </div>
</body>
</html>
