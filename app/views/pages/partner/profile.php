<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>I'm a Photographer</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>\css\partner\profile.css">
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
                        <span class="material-symbols-outlined beat-icon" onclick="openpopup()">edit</span>
                    </div>
        
                    <!-- 2nd -->
                    <div class="about-right" id="view">
                        <div class="title">
                            <h2><?php echo $data['partner']->FirstName .' ' . $data['partner']->LastName ?></h2><span class="material-symbols-outlined beat-icon" onclick="handleClick()">edit</span>
                        </div>
                        <p class="lead"><?php echo $data['partner']->Bio ?></p>
                        
                        <a href="#work" class="btn-down"></a>
                    </div>
                    <div class="about-right-form" id="edit">
                        <form action="" method="POST">
                            <input class="partner-name" placeholder="Type Name" type="text" value= "<?php echo $data['partner']->FirstName .' ' . $data['partner']->LastName ?>">
                            <textarea class="partner-contant" placeholder="Type Contant" type="text" ></textarea>
                            
                                <input class="submit" type="submit" value="edit_profile">
                            
                            <button class="cancel">cancel</button>
                        </form>

                    </div>
                </div>
            </div>
        </section>
        

        <!-- work section -->
        <div class = "title" style="left:30px">
            <h2>Specialiation</h2>
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
        <section id = "portfolio" class = "vh-100 py-7">
            <div class = "container">
                <div class = "portfolio-content">
                    <div class = "title">
                        <h2>my last works</h2>
                        <a href = "#contact" class = "btn-down">
                            
                        </a>
                    </div>

                    <div class="portfolio-grid">
                        <div>
                          <img src="<?php echo URLROOT ?>/images/partners/images/port-1.jpg" alt="Portfolio 1">
                        </div>
                        <div>
                          <img src="<?php echo URLROOT ?>/images/partners/images/port-2.jpg" alt="Portfolio 2">
                        </div>
                        <div>
                          <img src="<?php echo URLROOT ?>/images/partners/images/port-3.jpg" alt="Portfolio 3">
                        </div>
                        <div>
                          <img src="<?php echo URLROOT ?>/images/partners/images/port-4.jpg" alt="Portfolio 4">
                        </div>
                        <div>
                          <img src="<?php echo URLROOT ?>/images/partners/images/port-5.jpg" alt="Portfolio 5">
                        </div>
                        <div>
                          <img src="<?php echo URLROOT ?>/images/partners/images/port-6.jpg" alt="Portfolio 6">
                        </div>
                        <div>
                          <img src="<?php echo URLROOT ?>/images/partners/images/port-7.jpg" alt="Portfolio 7">
                        </div>
                        <div>
                            <img src="<?php echo URLROOT ?>/images/partners/images/port-8.jpg" alt="Portfolio 7">
                        </div>
                      </div>
                </div>
            </div>
        </section>
        <!-- end of portfolio section -->

        <!--Review-->

        <section id = "portfolio" class = "vh-100 py-7">
            <div class = "container">
                <div class = "portfolio-content">
                    <div class = "title">
                        <h2>Customer Reviews</h2>

        <div class="review-container">
            
            <div class="review">
              <h3>Alex</h3>
              <p class="rating">⭐⭐⭐⭐⭐</p>
              <p>"We were absolutely blown away by the wedding photos captured by this talented photographer! Every moment, from the ceremony to the reception, was beautifully and thoughtfully documented. The attention to detail and creativity truly exceeded our expectations. The photographer's ability to capture the emotions of the day is unmatched. Our wedding album is a treasure, and we are forever grateful for the incredible memories preserved so flawlessly. Highly recommend!"</p>
            </div>
          
            
            <div class="review">
              <h3>Ben</h3>
              <p class="rating">⭐⭐⭐⭐</p>
              <p>"Our experience with the photographer during our child's birthday party was overall excellent. The candid shots were amazing, and they did a fantastic job of capturing the joy and excitement of the celebration. The only reason for the 4-star rating is a slight delay in delivering the final edited photos. Nonetheless, the quality of the images and the photographer's professionalism during the event itself were outstanding. We would still recommend their services for capturing special moments."</p>
            </div>
          
            
            <div class="review">
              <h3>Charlie</h3>
              <p class="rating">⭐⭐⭐⭐</p>
              <p>"We hired this photographer for a family reunion, and the results were impressive. The group shots and individual portraits were beautifully composed, showcasing the warmth and love shared among family members. The photographer was patient and accommodating, ensuring everyone felt comfortable in front of the camera. Our only minor concern was the turnaround time for receiving the edited photos, which took a bit longer than expected. Nevertheless, the final images were worth the wait, and we have lovely memories to cherish. Would hire again for future events!"</p>
            </div>
          </div>

        </div></div></div></section>
       
    </main>
    <!-- end of main content -->

</div> 
    <!-- end of sidebar -->

</body>
</html>
<script>
   function handleClick(){
        var view = document.getElementById("view"); 
        var edit = document.getElementById("edit");
        view.style.display = "none";
        edit.style.display = "block";
        
    }
    function openpopup() {
        var popup = document.getElementsByClassName("pop-up");
        var container = document.getElementsByClassName("about-container");
        popup.style.display = "block";
        container.style.display = "none";
        console.log("hello")
}

   
</script>


     