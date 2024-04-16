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
	<?php include(APPROOT . '/views/include/partner-sidebar.php'); ?>
    
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
					<?php if($notification->Type ===  'allocate' ):?>
					<li>
						<a href="<?php echo URLROOT ?>/<?php echo $notification->Link; ?>" data-notification-id="<?php echo $notification->NotificationID; ?>"><?php echo $notification->Content?></a>
					</li>
					<?php endif; ?>
				<?php endforeach; ?>
			</ul>
		</div>

			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
				</div>

			</div>

            <ul class="box-info">
				<a href="<?php echo URLROOT ?>/partners/viewPartnerEvents/<?php echo $_SESSION['user_id']?>">
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
				
				<a href="<?php echo URLROOT ?>/reschedules/reschedulesForPartner/<?php echo $_SESSION['user_id'] ?>">
					<li>
						<i class='bx bx-message-rounded-error' ></i>
						<span class="text">
							<h3><?php// echo is_array($data['rescheduleCount']) ? count($data['rescheduleCount']) : $data['rescheduleCount']; ?></h3>
							<p>Reschedule Requests</p>
						</span>
					</li>
				</a>

			
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
							<?php if (isset($data['events']) && is_array($data['events'])) : ?>
								<?php foreach ($data['events'] as $event) : ?>
									<tr>
										<td>
											<i class='bx bxs-user-circle'></i>
											<p><?php echo $event->StartTime; ?></p>
										</td>
										<td><?php echo $event->EventDate; ?></td>
										<td><span class="status <?php echo $event->Status; ?>"><?php echo $event->Status; ?></span></td>
									</tr>
								<?php endforeach; ?>
							<?php else : ?>
								<tr>
									<td colspan="3">No events available.</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
				
	<div class="todo">
    <div class="head">
        <h3>Partners</h3>
    </div>
    <!-- <table class="partner-table">
	<hr/>
        <tbody>
            <tr class="partner-row">
                <td><a href="<?php// echo URLROOT ?>/users/getPhotographers">Feedbacks</a></td>
                <td>10</td>
            </tr>
            <tr class="partner-row">
                <td><a href="<?php// echo URLROOT ?>/users/getEditors">5+</a></td>
                <td>5</td>
            </tr>
            <tr class="partner-row">
                <td><a href="<?php// echo URLROOT ?>/users/getPrintingFirms">1+</a></td>
                <td>2</td>
            </tr>
        </tbody>
    	</table> -->
	</div>
	</div>
	</main>

	</section>
</div>
	<script>
		var URLRoot=<?php echo json_encode(URLROOT);?>;
	</script>
	<script src="<?php echo URLROOT ?>/js/notifications.js"></script>
</body>
</html>
