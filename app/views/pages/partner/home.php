<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        /* Container */
        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            max-width: 100vh;
            max-height: 100vh;
            margin: 0 auto;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Label and radio buttons */
        .label-container {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .radio-button {
            display: inline-block;
            margin: 0 10px;
        }

        .radio-button input[type="radio"] {
            display: none;
        }

        .radio-button label {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .radio-button input[type="radio"]:checked + label {
            background-color: #ff8c00;
        }

        /* Floating button */
        .floating-button {
            position: fixed;
            top: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: #ff8c00;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .floating-button svg {
            width: 32px;
            height: 32px;
            fill: #fff;
        }
    </style>
</head>
<body>
    <?php include(APPROOT . '/views/include/partner-navbar.php'); ?>
    
    <div class="container">
        <div class="label-container">
            My Availability
        </div>
        <div class="radio-button">
            <input type="radio" name="availability" id="on" value="on">
            <label for="on">On</label>
        </div>
        <div class="radio-button">
            <input type="radio" name="availability" id="off" value="off">
            <label for="off">Off</label>
        </div>
    </div>

    <!-- Floating button with SVG icon -->
    <div class="floating-button">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
        </svg>
    </div>
</body>
</html>
