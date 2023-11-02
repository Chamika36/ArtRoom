<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/manager-styles.css">
    <title>Requests</title>
</head>
<body>
    <div class="">
        <div class="row">
          <div class="mt-0 topimg">
            <div class="container mt-4">
                <ul class="nav nav-pills nav-justified gap-3 ">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo URLROOT ?>/viewPartnerEvents/<?php echo $_SESSION('user_id'); ?>">Requests</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Assigned Evenets</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="#">My Profile</a>
                      </li>
                      <li class="nav-item logout"> 
                        <a class="nav-link active" aria-current="page" href="<?php echo URLROOT ?>/users/logout">Logout</a>
                      </li>
                  </ul>

                  <h1 class="mt-5">Requests</h1>
            </div>
          </div>
        </div>
      </div>
    <main>
        <table class="table">
          <thead class="thead">
            <tr>
              <th class="eve">Event ID</th>
              <th>Date</th>
              <th>Time</th>
              <th>Location</th>
              <th>Event Type</th>
              <th class="act">Actions</th>
            </tr>
          </thead>
          <tbody class="tbody">
            <?php foreach($data['events'] as $event) : ?>
            <tr class="tr with-border">
              <td class="box"><?php echo $event->EventID; ?></td>
              <td><?php echo $event->Date; ?></td>
              <td><?php echo $event->StartTime; ?></td>
              <td><?php echo $event->Location; ?></td>
              <td><?php echo $package->PackageName; ?></td>
              <td class="">
                <a href="#"><button class="button" style="{color: #000; background-color:#DBB28C; padding-top: 8px; padding-bottom: 8px;}">Decline</button></a>
                <a href="#"><button class="button" style="{color: #000; background-color:#DBB28C; padding-top: 8px; padding-bottom: 8px;}">View Details</button></a>
              </td> 
            </tr>
            <?php endforeach; ?>

            <tr class="tr with-border">
              <td class="box">01</td>
              <td>18/11/2022</td>
              <td>8.00 a.m</td>
              <td>Battaramulla</td>
              <td>Party</td>
              <td class="act">
                <button class="but"><a style="color: #fff;" href="#">Decline</a></button>
                <button class="but1"><a style="color: #fff;" href="#">View Details</a></button>
              </td>
            </tr>
            <tr class="tr with-border">
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
            <tr class="tr with-border">
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
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </main>
</body>
</html>