<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample View</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/view.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/modal.css">
</head>
<body>

<?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>

<div class="home">

<section id="portfolio" class="vh-100 py-7">
    <div class="container">
        <div class="portfolio-content">
            <div class="sample-info">
                <h2><?php echo $data['sample']->SampleName; ?></h2>
                <p><?php echo $data['sample']->Description; ?></p>
                <p>Date: <?php echo $data['sample']->Date; ?></p>
            </div>

            <div class="portfolio-grid">
                <?php foreach ($data['images'] as $image) : ?>
                    <div>
                        <img src="<?php echo URLROOT ?>/<?php echo $image ?>" alt="Sample Image">
                    </div>
                <?php endforeach; ?>
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
