<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff; /* Set your background color */
        }
        
        .topimg {
            background-color: #d27408; /* Adjust the background color to your preferred shade of orange */
            color: #8B4513; /* Set text color */
            padding: 20px;
        }
        
        .nav {
            display: flex;
            justify-content: space-between;
            list-style: none;
            padding: 0;
        }
        
        .nav-item {
            margin: 0;
        }
        
        .nav-link {
            text-decoration: none;
            color: #ffffff; /* Set the link text color */
        }
        
        .nav-link.active {
            font-weight: bold;
        }
        
        h1 {
            margin: 10px 0;
        }
        
        .bg-orange {
            background-color: #d27408; /* Adjust the hex code for your preferred shade of orange */
        }
    </style>
    <title>Home</title>
</head>
<body>
    <div class="topimg">
        <div class="container mt-4">
            <ul class="nav nav-justified gap-3 ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Assigned Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">My Profile</a>
                </li>
                <li class="nav-item logout"> 
                    <a class="nav-link active" aria-current="page" href="#">Logout</a>
                </li>
            </ul>
            <h1>Home</h1>
        </div>
    </div>

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
