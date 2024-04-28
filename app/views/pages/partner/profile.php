<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I'm a Photographer</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>\css\partner\profile.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/samples.css">

    <style>
        button[type="button"] {
        box-shadow: 0px 0px 5px white;
}


    </style>

</head>
<body>
    <!-- sidebar -->
    <!-- main content -->
    <?php include(APPROOT . '/views/include/partner-sidebar.php'); ?>
    
    <div class="home">
    <main>
        <!--header-->  
        
        <section id="about" class="about py-7">
            <div class="container">
                <div class="pop-up"></div>
                <div class="about-container">
                    
                    <div class="about-left">
                        <div class="image-container">
                            <img src="<?php echo URLROOT ?>/images/partners/images/about-pic.jpg" alt="" class="im" >
                        </div>

                        <!-- <span class="material-symbols-outlined beat-icon">edit</span> -->
                    </div>
        
                    <!-- 2nd -->
                    
                    <div class="about-right" id="view" >
                        <div class="" style="padding-bottom: 16px;">
                            <h2><?php echo $data['partner']->FirstName .' ' . $data['partner']->LastName ?>
                            <?php if(isset($_SESSION['user_id']) && ($data['partner']->UserID == $_SESSION['user_id'])) : ?>
                                <a href="<?php echo URLROOT?>/partners/editpartner/<?php echo $_SESSION['user_id']?>"><span class="material-symbols-outlined beat-icon">edit</span></a></h2>
                                <p class="lead" style="margin-bottom: 16px;"><?php echo ($data['partner']->Bio) ? ($data['partner']->Bio) : 'Click to add a bio'?></p>
                            <?php else : ?>
                                <p class="lead" style="margin-bottom: 16px;"><?php echo ($data['partner']->Bio) ? ($data['partner']->Bio) : 'No bio available'?></p>
                            <?php endif; ?>
                        </div>

                        <!--
                            </div>
                        <p class="lead">Welcome to the world through my lens! I'm Jason, a seasoned professional photographer with a passion for capturing life's beautiful moments. Armed with a degree in photography and a keen eye for aesthetics, I bring a unique blend of creativity and commercial sense to every project.</p>
                        <p class="lead">Whether it's the romantic allure of weddings, the joyous celebration of birthdays, or the warmth of family events, I'm dedicated to creating images that tell stories, evoke emotions, and leave a lasting impression. Join me on this visual journey where creativity meets commercial sense, and let's capture the essence of your special moments together.</p>
                        <a href="#work" class="btn-down"></a>
                           </div>
                        -->
                        
                        
                    </div>


                    <!-- <div class="about-right-form" id="edit">
                        
                     
                        <div id="editBioModal" class="modal">
                            <div class="modal-content">
                                <span class="close-button">&times;</span>
                                <form action="partners/editbio/<?php //echo $_SESSION['user_id']?>" method="POST">
                                    <div class="modal-body">
                                        <label>Name:</label>
                                        <input class="partner-name form-control mb-3" style="font-weight: bold;" placeholder="Type Name" type="text" value="<?php echo $data['partner']->FirstName .' ' . $data['partner']->LastName ?>" disabled>
                                        <label>Bio:</label>
                                        <textarea class="partner-content form-control" placeholder="Edit Bio" name="bio"><?php //echo $data['partner']->Bio ?></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="close-button">Cancel</button>
                                        <input type="submit" class="btn btn-primary" value="Save Changes">
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div> -->
                </div>
            </div>
        </section>
        

        <!-- work section -->
        <br/><br/>
        <div class = "title" >
            <h2 style="padding:10px;">Specialization</h2>
        </div>
        <section id = "work" class = "vh-100 flex py-7">
            <div class = "container">
                <div class = "work-content">
                    
                    <div class = "work-bottom grid">
                        <div>
                            <span class = "icon"><img src = "<?php echo URLROOT ?>/images/partners/images/wildlife-icon.png"></span>
                            <h3>Wildlife</h3>
                        </div>
                        <div>
                            <span class = "icon"><img src = "<?php echo URLROOT ?>/images/partners/images/portrait-icon.png"></span>
                            <h3>Portrait</h3>
                        </div>
                        <div>
                            <span class = "icon"><img src = "<?php echo URLROOT ?>/images/partners/images/landscape-icon.png"></span>
                            <h3>Landscape</h3>
                        </div>
                        <div>
                            <span class = "icon"><img src = "<?php echo URLROOT ?>/images/partners/images/family-icon.png"></span>
                            <h3>Family</h3>
                        </div>
                    </div>
                    <a href = "#portfolio" class = "btn-down btn-down-white">
                        
                    </a>
                </div>
            </div>
        </section>
        <!-- end of work section -->

        <!-- portfolio section -->
        <div class = "title" >
            <h2 style="padding:10px;">My Recent Works</h2>
        </div>
        <div class="container">
    
            <?php foreach ($data['samples'] as $sample) : ?>
            
            <div class="item-container">
                
                <div class="img-container">
                    <!-- Displaying the cover image of the sample -->
                    <img src="<?php echo URLROOT ?>/<?php echo $sample->CoverImagePath; ?>" alt="Cover Image">
                </div>

                <div class="body-container">
                <div class="overlay"></div>


                    <div class="event-info">
                        <p class="title"><?php echo $sample->SampleName ?></p>
                        <div class="separator"></div>
                            <p class="info">ArtRoom Photography</p>
                            

                            <div class="additional-info">
                                <p class="info description">    
                                    <?php echo $sample->Date; ?>
                                </p>
                            </div>
                    
                    

                    <div class="button-container">
                        <button class="action view-button" onclick="window.location.href='<?php echo URLROOT ?>/samples/viewSample/<?php echo $sample->SampleID; ?>'">View</button>
                    </div>
                    
                    

                    
                    
                    </div> 

                </div>
            </div>
            </a>
            <?php endforeach; ?>

        </div>

        </div>
       
    </main>
    <!-- end of main content -->

</div> 
    <!-- end of sidebar -->

</body>
</html>

   <script>
    // Get the modal
    var modal = document.getElementById('editBioModal');

    // Get the button that opens the modal
    var btn = document.getElementById('edit-button'); // Corrected ID

    // Get the <span> elements that close the modal
    var closeButtons = document.querySelectorAll(".close-button"); // Use querySelectorAll to get all close buttons

    // When the user clicks the button, open the modal
    btn.addEventListener('click', function() {
        modal.style.display = "block";
    });

    function handleClick() {
        modal.style.display = "block";
    }

    // Attach click event to each close button
    closeButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            modal.style.display = "none";
        });
    });

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function openpopup() {
        var popup = document.querySelector(".pop-up"); // Use querySelector if only one popup
        var container = document.querySelector(".about-container"); // Assuming there's only one about-container
        popup.style.display = "block";
        container.style.display = "none";
        console.log("Popup opened");
    }
</script>



     