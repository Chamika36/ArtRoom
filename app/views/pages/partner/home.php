<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <title>Home</title>

    <style>
 .availability-container {
  display: flex;
  align-items: center;
  justify-content: center; /* Center horizontally */
  margin: 20px auto; /* Center horizontally, set vertical margin as needed */
  padding: 20px;
  background-color: #f0f0f0;
  border: 1px solid #ccc;
  border-radius: 5px;
  width: 600px;
  
}


.availability-container label {
  margin-right: 10px;
}

.availability-container input[type="checkbox"] {
  width: 20px; /* Reduce the width of the checkbox */
  height: 20px; /* Set the height of the checkbox */
  margin: 0; /* Remove default margin */
  transform: scale(1); /* Reset the scale for the checkbox */
}

/* Style the checkbox when it's checked */
.availability-container input[type="checkbox"]:checked + label::before {
  content: '\2714'; /* Unicode checkmark symbol */
  color: #00b300; /* Green color */
  font-size: 20px;
}

/* Style the checkbox when it's not checked */
.availability-container input[type="checkbox"] + label::before {
  content: '\2717'; /* Unicode cross symbol */
  color: #ff0000; /* Red color */
  font-size: 20px;
}

.availability-container {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 20px auto;
  padding: 20px;
  background-color: #f0f0f0;
  border: 1px solid #ccc;
  border-radius: 5px;
  width: 600px;
}

.availability-container label {
  margin-right: 10px;
}

.availability-container input[type="checkbox"] {
  width: 20px;
  height: 20px;
  margin: 0;
  transform: scale(1);
}

.availability-container input[type="checkbox"]:checked + label::before {
  content: '\2714';
  color: #00b300;
  font-size: 20px;
}

.availability-container input[type="checkbox"] + label::before {
  content: '\2717';
  color: #ff0000;
  font-size: 20px;
}

.shape-container {
  display: flex;
  justify-content: center; /* Center horizontally */
  margin-top: 4%; /* Adjust the margin as needed to move it down */
}



.shape {
  width: 220px;
  height: 180px;
  background-color: #BFA586;
  border: 1px solid #333;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 20px;
  font-weight: bold;
  font-size: 25px;
  border-radius: 15px;
  transition: transform 0.3s; /* Add a smooth transition for the transform property */
}

.shape:hover {
  transform: scale(1.1); /* Scale the shape when the mouse is over it */
}




    </style>

</head>
<body>
    <?php include(APPROOT . '/views/include/partner-navbar.php'); ?>

    <div class="availability-container">
  <label for="available-checkbox">Available</label>
  <input type="checkbox" id="available-checkbox" name="availability">
</div>

<div class="availability-container">
  <label for="not-available-checkbox">Not Available</label>
  <input type="checkbox" id="not-available-checkbox" name="availability">
</div>

<div class="shape-container">
  <div class="shape">
    <p>Number of Requests</p>
  </div>
  <div class="shape">
    <p>Ongoing</br> Events</p>
  </div>
  <div class="shape">
    <p>Completed</br> Events</p>
  </div>
</div>

</body>
</html>
