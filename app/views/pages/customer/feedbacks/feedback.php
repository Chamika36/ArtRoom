

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Submission</title>
    <style>
               body{
            background-color:#FBF9F3;
            font-family: "Poppins", sans-serif;
        
    }

    section{
        background-color:#fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        align-items: center;
        width: 28%;
        
        padding: 30px;
        border-radius: 15px;
        box-shadow: 2px 6px 10px 0 rgba(0, 0, 0, 0.2);
       
    }

    .branding{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        margin-bottom: 35px;
        

    }
    .artroom-logo{
      width: 90px;
      height: 90px;
      
    }
    .brand-name{
        color: #2E2626;
        font-family: Otomanopee One;
        font-size: 40px;
        font-style: normal;
        font-weight: 400;
        line-height: 118.9%; /* 76.096px */
        
        mix-blend-mode: darken;
        font-weight: bold;
        
    }

    h4{
        margin-bottom: 30px;
    }

    label{
        font-size: 16px;
        
        color: #2E2626;
        margin-top: 20px;
        
    }

    textarea{
        width: 90%;
        height: 80px;
        border-radius: 6px;
        margin-top: 5px;
        border: 0.5px solid rgba(0, 0, 0, 0.2);
        /* background-color: #F2F2F2;
        color: #2E2626; */
        font-family: Arial, sans-serif;  /* Consistent font */
        font-size: 14px;  /* Readable font size */
        line-height: 1.5;  /* Improve readability */
        color: #333;  /* Dark text color */
        background-color: #f9f9f9; 
        text-align: center;
        }

    textarea:focus {
        border-color: #66afe9;  /* Highlight border on focus */
        outline: none;  /* Remove default outline */
        /* background-color: #fff;   */
    }

    .number-input {
        margin: 20px 0;  /* Add some spacing */
        }

    label {
        font-size: 1em;  /* Adjust the label font size */
        }

    input[type="number"] {
        padding: 5px;  /* Add padding to the input box */
        font-size: 1em;  /* Adjust font size for readability */
        width: 100px;  /* Set the width of the input box */
        text-align: center;  /* Center-align the text in the box */
        border: 1px solid #ccc;  /* Basic border styling */
        border-radius: 5px;  /* Rounded corners */
        text-align: center;
        margin-top: 5px;
        }


    input::placeholder {
        text-align: center;
        opacity: 0.8;
    }

    input:focus {
        background-color: rgba(30, 144, 255, 0.1);
        outline-color: rgba(30, 144, 255, 0.5);
    
    }



    button{
        background-color: #3b3d3e;
        color: white;
        width: 92%;
        height: 38px;
        border-radius: 6px;
        margin-top: 10px;
        cursor: pointer;
        font-weight: bold;
        transition: 0.2s;
        border: 0.5px solid rgba(0, 0, 0, 0.5);
        font-size: 15px;
        margin-top: 20px;
    }

    button:hover{
        background-color: #f9b234;
        color: black
    }

    h4{
        opacity: 0.6;
    }
    
        </style>
</head>
<body>
    <section>
    <div class="branding">
                            
        <div class="artroom-logo">
            <img class="artroom-logo" src="<?php echo URLROOT?>/images/logo.png" alt="logo">
        </div>
        <div class="brand-name">Art Room</div>
    </div>
    <h1>Share Your Experience With Others</h1>
    <h4>We highly value your feedback! Kindly take a moment to rate your experience and provide us with your valueble feedback.</h4>
    <form method="POST" action="<?php echo URLROOT; ?>/Feedbacks/submitFeedback">
        <label for="message"></label>
        <textarea name="feedback" id="feedback" placeholder="Tell Us About Your Experience" value="<?php echo $data['feedback']; ?>" required></textarea><br>

        <div class="number-input">
        <label for="rating">Rate your experience out of 10: </label></br>
        <input id="rating" name="rating" type="number" min="1" max="10" step="1" value="<?php echo $data['feedback']; ?>" required>  <!-- Set default value -->
        </div>

        <button type="submit" value="Submit">Submit</button>
    </form>
    </section>
</body>
</html>