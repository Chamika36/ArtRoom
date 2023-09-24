<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtRoom</title>
    <link rel="stylesheet" href="../../../public/css/navbar.css">
</head>


<body>
    <!-- Navbar -->
    <div class="navbar">
        <nav>          
            <ul>
                <li><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M12 19V5M12 5L5 12M12 5L19 12" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    </a>
                </li>
                <!-- Common Items for All Users -->
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Packages</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Users</a></li>

                <li class="right"><a href="#">Log out</a></li>
                
                <!-- User-Specific Items (Added Dynamically using PHP) -->
            </ul>
        </nav>

        <label class="title">Dashboard</label>
    </div>
    <!-- Content of the Page Goes Here -->
</body>
</html>

