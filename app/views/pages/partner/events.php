<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/requests.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .topimg {
            background-color: brown;
            color: white;
            padding: 10px 0;
        }

        .container {
            margin: 0 auto;
            max-width: 1200px;
            padding: 0 15px;
        }

        .nav {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: space-between;
        }

        .nav a {
            text-decoration: none;
            color: white;
        }

        h1 {
            text-align: center;
        }

        main {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 5px;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        .thead {
            background-color: #007bff;
            color: white;
        }

        .tbody .tr {
            border-bottom: 1px solid #ccc;
        }

        .act button {
            padding: 5px 10px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .but {
            background-color: #dc3545;
            color: white;
        }

        .but1 {
            background-color: #007bff;
            color: white;
        }
    </style>
    <title>Requests</title>
</head>
<body>
    
<div class="container">
        <div id="header">
            <?php include(APPROOT . '/views/include/partner-sidebar.php'); ?>
        </div>

    <div id="main">
    <main>
        <table class="requests">
            <thead class="thead">
                <tr>
                    <th class="eve">Event ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Location</th>
                    <th>Details</th>
                    <th class="act">Actions</th>
                </tr>
            </thead>
            <tbody class="tbody">
                <?php foreach ($data['events'] as $event) : ?>
                    <tr class="tr with-border">
                        <td class="box"><?php echo $event->EventID; ?></td>
                        <td><?php echo $event->EventDate; ?></td>
                        <td><?php echo $event->StartTime; ?></td>
                        <td><?php echo $event->Location; ?></td>
                        <td class="act">
                            <a href="<?php echo URLROOT ?>/partners/viewEvent/<?php echo $event->EventID?>"><button class="button">View Details</button></a>
                        </td>
                        <td class="">
                            <?php if ($event->Status == 'Accepted') : ?>
                                <button class="button">Accepted</button>
                            <?php elseif ($event->Status == 'Canceled') : ?>
                                <button class="button">Canceled</button>
                            <?php else : ?>
                                <a href="<?php echo URLROOT ?>/partners/updatePartnerAction/<?php echo $_SESSION['user_type_id']?>/<?php echo $event->EventID?>/Accepted/Ok/"><button class="button">Accept</button></a>
                                <a href="<?php echo URLROOT ?>/partners/updatePartnerAction/<?php echo $_SESSION['user_type_id']?>/<?php echo $event->EventID?>/Declined/Busy/"><button class="button">Decline</button></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

                <!-- <tr class="tr with-border">
                    <td class="box">02</td>
                    <td>18/11/2022</td>
                    <td>8.00 a.m</td>
                    <td>Colombo 07</td>
                    <td>Wedding</td>
                    <td class="act">
                        <button class="but"><a style="color: #fff;" href="#">Decline</a></button>
                        <button class="but1"><a style="color: #fff;" href="#">View Details</a></button>
                    </td>
                </tr>
                <tr class="tr with-border">
                    <td class="box">03</td>
                    <td>18/11/2022</td>
                    <td>8.00 a.m</td>
                    <td>Colombo 07</td>
                    <td>Party</td>
                    <td class="act">
                        <button class="but"><a style="color: #fff;" href="#">Decline</a></button>
                        <button class="but1"><a style="color: #fff;" href="#">View Details</a></button>
                    </td>
                </tr>
                <!-- Additional rows you provided -->
                <!-- <tr class="tr with-border">
                    <td class="box">04</td>
                    <td>18/11/2022</td>
                    <td>9.00 a.m</td>
                    <td>Kandy</td>
                    <td>Meeting</td>
                    <td class="act">
                        <button class="but"><a style="color: #fff;" href="#">Decline</a></button>
                        <button class="but1"><a style="color: #fff;" href="#">View Details</a></button>
                    </td>
                </tr>
                <tr class="tr with-border">
                    <td class="box">05</td>
                    <td>18/11/2022</td>
                    <td>10.00 a.m</td>
                    <td>Galle</td>
                    <td>Conference</td>
                    <td class="act">
                        <button class="but"><a style="color: #fff;" href="#">Decline</a></button>
                        <button class="but1"><a style="color: #fff;" href="#">View Details</a></button>
                    </td>
                </tr>
                Add more rows as needed --> 
            </tbody>
        </table>
    </main>
    </div>
</div>
</body>
</html>
