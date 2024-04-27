<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample View</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/view.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Style the button */
        .btn {
            background-color: #3085d6; /* Blue */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #007bff;
        }

        .label {
            font-size: 16px;
            color: #333;
            margin-right: 10px;
        }
    </style>

</head>
<body>

<?php //include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>


<div class="home">

<?php if(isset($data['sample']->Visibility) && $data['sample']->Visibility == 0 && $data['sample']->CustomerID == $_SESSION['user_id']) : ?>
  <div>
      <span class="label">By clicking the button here, you can make your sample visible to public.</span>
      <button class="btn" onClick="makePublic()">Make Public</button>
  </div>
<?php endif; ?>

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

function makePublic() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, make it public!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "<?php echo URLROOT ?>/samples/makePublic/<?php echo $data['sample']->SampleID; ?>";
            Swal.fire(
                'Made Public!',
                'Your sample has been made public.',
                'success'
            )
        }
    })
};
</script>

</body>
</html>
