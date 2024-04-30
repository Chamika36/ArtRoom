<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample View</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/view.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/modal.css">
    <style>
        /* Center the portfolio grid */
        .portfolio-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        /* Add some spacing between images */
        .portfolio-grid div {
            margin: 10px;
        }
    </style>
</head>
<body>

<?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>

<div class="home">

<section id="portfolio" class="vh-100 py-7">
    <div class="container">
        <div class="portfolio-content">
            <div class="sample-info">
                <h2><?php echo isset($data['sample']->SampleName) ? $data['sample']->SampleName : ''; ?></h2>
                <p><?php echo isset($data['sample']->Description) ? $data['sample']->Description : ''; ?></p>
                <p>Date: <?php echo isset($data['sample']->Date) ? $data['sample']->Date : ''; ?></p>
            </div>

            <div class="portfolio-grid">
                <?php if(isset($data['images']) && is_array($data['images']) && !empty($data['images'])): ?>
                    <?php foreach ($data['images'] as $image): ?>
                        <div>
                            <img src="<?php echo URLROOT ?>/<?php echo $image ?>" alt="Sample Image">
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No images available for this sample.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal container -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption" class="modal-caption"></div>
  <!-- Left and right arrow buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal
var images = document.querySelectorAll(".portfolio-grid img");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

// Variables to keep track of current slide index
var slideIndex = 1;

// Function to open the modal and show the selected image
function openModal() {
  modal.style.display = "block";
}

// Function to close the modal
function closeModal() {
  modal.style.display = "none";
}

// Function to navigate to the previous or next slide
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Function to display a specific slide
function showSlides(n) {
  var i;
  var slides = document.querySelectorAll(".portfolio-grid img");
  if (n > slides.length) { slideIndex = 1; }
  if (n < 1) { slideIndex = slides.length; }
  modalImg.src = slides[slideIndex - 1].src;
  captionText.innerHTML = slides[slideIndex - 1].alt;
}

// Event listener for image clicks
images.forEach(function(image, index) {
  image.addEventListener("click", function() {
    openModal();
    slideIndex = index + 1; // Set current slide index
    showSlides(slideIndex); // Show selected image
  });
});

// Event listener for close button
var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
  closeModal();
};

// Event listener for modal clicks
modal.onclick = function(event) {
  if (event.target == modal) {
    closeModal();
  }
};
</script>

</body>
</html>



@import url('https://fonts.googleapis.com/css2?family=Sacramento&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

.container {
    align-items: center;
    text-align: center;
    padding: 0 20px;
}

.sample-info {
    margin-bottom: 20px;
    margin-top: 40px; 
}

.sample-info h2 {
    font-family: 'Sacramento', cursive;
    font-size: 40px;
    margin-bottom: 20px;
}

.sample-info p {
    font-size: 17px;
    color: #373232;
    margin-bottom: 12px;
}

/* portfolio */
.portfolio-grid > div {
    transition: var(--transition);
}

.portfolio-grid > div:hover {
    transform: scale(0.9);
}

.portfolio-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Center the portfolio grid */
    gap: 20px;
}

.portfolio-grid div {
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    height: 300px;
}

.portfolio-grid div:hover {
    transform: scale(1.05);
}

.portfolio-grid div:hover img {
    filter: grayscale(100%);
}

.portfolio-grid img {
    display: block;
    margin: 0 auto;
    max-width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Modal styles */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.9);
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  max-width: 90%;
  max-height: 90%;
  padding-top: 50px; /* Adjust the padding as needed */
}

/* Caption of Modal Image */
.modal-caption {
  display: block;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
}

/* Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* Left and right arrow buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px; /* Adjust the position as needed */
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

.prev {
  left: 0;
}

.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color */
.prev:hover, .next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}
