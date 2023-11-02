<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Cancellation page</title>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-navbar.css">
    <link rel="stylesheet" href="../../../../public/css/grid.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/logo.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/customer-mainPages.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />

    <style>
        .bottom-column {
            flex: 4;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .bottom-column form {
            display: flex;
            flex-direction: column;
            max-width: 60%; /* Adjust the maximum width as needed */
            margin: 0 auto; /* Center the form horizontally */
        }

        .bottom-column label {
            font-weight: bold;
            margin-top: 10px;
        }

        .bottom-column select,
        .bottom-column input,
        .bottom-column textarea {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .bottom-column input[type="date"] {
            width: 100%;
        }

        .bottom-column input[type="submit"] {
            background-color: #504334;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s;
            align-self: flex-end; /* Move the submit button to the right bottom corner */
        }

        .bottom-column input[type="submit"]:hover {
            background-color: #774001;
        }

        .cancelRequest{
            width: 350px;
            height: 48px;
            flex-shrink: 0;
            color: #000;
            text-align: center;
            font-family: Istok Web;
            font-size: 32px;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            letter-spacing: 1.6px;
            mix-blend-mode: darken;
            margin-left: 10%;
        }


    </style>
    
</head>
<body>
    <div>
    <?php include(APPROOT . '/views/include/customer-navbar.php'); ?>
    </div>
    <div class="container">
        <div class="bottom-row">
        <div class="left-area">
            <?php include(APPROOT . '/views/pages/customer/sidebar/sidebar.php'); ?>
        </div>
            <div class="bottom-column">
            <h2 class="cancelRequest">Cancel Request</h2>
                <form>
                    
                <label for="cancel-request">Reason For Cancellation </label>
                <textarea id="cancel-request" name="cancel-request" rows="4"></textarea>

                <input type="submit" value="Cancel Request">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
