<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample View</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/view.css">
</head>
<body>

<?php //include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>


<div class="home">

<section id = "portfolio" class = "vh-100 py-7">
    <div class="container">
        <div class = "portfolio-content">
            <div class = "sample-info">
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
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal
var images = document.querySelectorAll(".portfolio-grid img");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

images.forEach(function(image) {
  image.addEventListener("click", function() {
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  });
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
};
</script>

</body>
</html>
