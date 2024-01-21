<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo URLROOT ?>/css/dashboard.css">
</head>
<body>

        
		<!--sidebar-->
        <div id="menu">
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        </div>


	<div id="main">
    <section id="content">
		
	<!--MAIN -->
		<main>


		<!-- Notification Icon -->
		<div class="notification-wrapper">
        <div class="notification-icon">
            <i class='bx bxs-bell'></i>
            <span class="num"><b>8</b></span>
        </div>
    </div>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
				</div>

			</div>

            <ul class="box-info">
				<a href="<?php echo URLROOT ?>/events">
					<li>
						<i class='bx bxs-calendar-plus' ></i>
						<span class="text">
							<h3><?php echo is_array($data['eventCount']) ? count($data['eventCount']) : $data['eventCount']; ?></h3>
							<p>Event Requests</p>
						</span>
					</li>
				</a>

				<a href="<?php echo URLROOT ?>/events">
					<li>
						<i class='bx bxs-calendar-check' ></i>
						<span class="text">
							<h3><?php echo is_array($data['requestCount']) ? count($data['requestCount']) : $data['requestCount']; ?></h3>
							<p>Ongoing Events</p>
						</span>
					</li>
				</a>

				<li>
					<i class='bx bx-message-rounded-error'></i>
					<span class="text">
						<h3>2</h3>
						<p>Reschedule Requests</p>
					</span>
				</li>
			</ul>


            <div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Event </th>
								<th>Date Order</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data['events'] as $event) : ?>
								<tr>
									<td>
										<i class='bx bxs-user-circle' ></i>
										<p><?php echo $event->Package; ?></p>
									</td>
									<td><?php echo $event->EventDate; ?></td>
									<td><span class="status <?php echo $event->Status; ?>"><?php echo $event->Status; ?></span></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				
	<div class="todo">
    <div class="head">
        <h3>Partners</h3>
    </div>
    <table class="partner-table">
 
        <tbody>
            <tr class="partner-row">
                <td><a href="<?php echo URLROOT ?>/users/getPhotographers">Photographers</b></a></td>
                <td>10</td>
                
            </tr>
            <tr class="partner-row">
                <td><a href="<?php echo URLROOT ?>/users/getEditors">Editors</a></td>
                <td>5</td>
            </tr>
            <tr class="partner-row">
                <td><a href="<?php echo URLROOT ?>/users/getPrintingFirms">Printing Firms</a></td>
                <td>2</td>
            </tr>
        </tbody>
    	</table>
	</div>






			</div>
		</main>

	</section>

	
							</div>
	<script src="/js/manager/script.js"></script>
</body>
</html>
