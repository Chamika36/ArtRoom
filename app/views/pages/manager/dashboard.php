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
        <!-- <div id="menu"> -->
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        <!-- </div> -->


	<div class="home">
    <section id="content">
		
	<!--MAIN -->
		<main>


		<!-- Notification Icon -->
		<div class="notification-wrapper">
			<div class="notification-icon">
				<i class='bx bxs-bell'></i>
				<span class="num"><b><?php echo $data['unreadNotificationCount']; ?></b></span>
			</div>
			<!-- Dropdown for notifications -->
			<ul class="dropdown-menu">
				<?php foreach($data['notifications'] as $notification) : ?>
					<li>
						<?php if($notification->Type === 'request') : ?>
							<a href="<?php echo URLROOT ?>/events/view/<?php echo $notification->event_id; ?>"><?php echo $notification->Content?></a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
				</div>

			</div>

            <ul class="box-info">
				<a href="<?php echo URLROOT ?>/events/calendar/request">
					<li>
						<i class='bx bxs-calendar-plus' ></i>
						<span class="text">
							<h3><?php echo is_array($data['requestCount']) ? count($data['requestCount']) : $data['requestCount']; ?></h3>
							<p>Event Requests</p>
						</span>
					</li>
				</a>

				<a href="<?php echo URLROOT ?>/events/calendar/ongoing">
					<li>
						<i class='bx bxs-calendar-check' ></i>
						<span class="text">
							<h3><?php echo is_array($data['eventCount']) ? count($data['eventCount']) : $data['eventCount']; ?></h3>
							<p>Accepted Events</p>
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
	<hr/>
        <tbody>
            <tr class="partner-row">
                <td><a href="<?php echo URLROOT ?>/users/getPhotographers">Photographers</a></td>
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
	<script src="<?php echo URLROOT ?>/js/notifications.js"></script>
	<!-- <script>
		document.addEventListener("DOMContentLoaded", function() {
		var notificationIcon = document.querySelector('.notification-icon');
		var dropdownMenu = document.querySelector('.dropdown-menu');

		// Toggle dropdown menu when clicking on notification icon
		notificationIcon.addEventListener('click', function(event) {
			event.stopPropagation(); // Prevent the click event from bubbling up to the document
			dropdownMenu.classList.toggle('show');
			
			// Update notification status when dropdown is shown
			if (dropdownMenu.classList.contains('show')) {
				markNotificationsAsRead();
			}
		});

		// Function to mark notifications as read
		function markNotificationsAsRead() {
			// Make an AJAX request to update notification status
			var xhr = new XMLHttpRequest();
			xhr.open('GET', '<?php echo URLROOT ?>/notifications/markAsRead', true);
			xhr.onreadystatechange = function() {
				if (xhr.readyState === XMLHttpRequest.DONE) {
					if (xhr.status === 200) {
						// Notification status updated successfully
						// You can update the UI to reflect the change if needed
					} else {
						// Error handling
						console.error('Failed to update notification status');
					}
				}
			};
			xhr.send();
		}

		// Close dropdown menu when clicking outside of it
		document.addEventListener('click', function(event) {
				if (!dropdownMenu.contains(event.target) && !notificationIcon.contains(event.target)) {
					dropdownMenu.classList.remove('show');
				}
			});
		});

	</script> -->
</body>
</html>
