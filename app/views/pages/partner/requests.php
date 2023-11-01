<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/requests.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.18.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.18.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>    


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
                        <a class="nav-link active" aria-current="page" href="#">Requests</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Assigned Evenets</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="#">My Profile</a>
                      </li>
                      <li class="nav-item logout"> 
                        <a class="nav-link active" aria-current="page" href="#">Logout</a>
                      </li>
                  </ul>

                  <h1 class="mt-5">Requests</h1>
            </div>
          </div>
        </div>
      </div>
    <main>
        <table class="requests">
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