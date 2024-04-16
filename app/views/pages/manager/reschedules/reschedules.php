<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reschedule</title>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/manager/photographertable.css">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 2% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 82%;
            overflow: auto;
        }

        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        #modalFrame {
            width: 100%;
            height: 550px; 
        }
    </style>
</head>
<body>
    <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>

    <div class="home">
        <main class="table" id="reschedule_table">
            <section class="table__header">
                <h1>Reschedules</h1>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <th>Reschedule ID</th>
                        <th>Event ID</th>
                        <th>New Event Date</th>
                        <th>New Start Time</th>
                        <th>New End Time</th>
                        <th>New Location</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php foreach ($data['reschedules'] as $reschedule) : ?>
                            <tr>
                                <td><?php echo $reschedule->ID; ?></td>
                                <td><?php echo $reschedule->EventID; ?></td>
                                <td><?php echo $reschedule->NewEventDate; ?></td>
                                <td><?php echo $reschedule->NewStartTime; ?></td>
                                <td><?php echo $reschedule->NewEndTime; ?></td>
                                <td><?php echo $reschedule->NewLocation; ?></td>
                                <td><a href="#" class="manage-schedule" data-url="<?php echo URLROOT; ?>/reschedules/manage/<?php echo $reschedule->ID; ?>"><p class="status shipped"><b>Reschedule</b></p></a></td> 
                                <td><a href="<?php echo URLROOT; ?>/reschedules/delete/<?php echo $reschedule->ID; ?>"><p class="status cancelled"><b>Delete</b></p></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>

    <!-- Modal HTML -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <iframe id="modalFrame" src="" frameborder="0" scrolling="no"></iframe>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal
            var manageButtons = document.getElementsByClassName("manage-schedule");
            Array.from(manageButtons).forEach(function(button) {
                button.addEventListener("click", function() {
                    var url = button.getAttribute("data-url");
                    console.log(url)
                    document.getElementById("modalFrame").src = url;
                    modal.style.display = "block";
                });
            });

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            };

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };
        });
    </script>
</body>
</html>
