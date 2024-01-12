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
<section id="sidebar">
        
         <!--<div id="header">
            <//?php include(APPROOT . '/views/include/sidebar/manager-navbar.php'); ?>
        </div> -->
        <!-- Navbar -->
        <div id="menu">
            <?php include(APPROOT . '/views/include/sidebar/manager-sidebar.php'); ?>
        </div>

          <!-- !!!!!!!!!!!!!!! -->
</section>
    <section id="content">
		<!-- NAVBAR -->

		<!-- <nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>

			<label for="switch-mode" class="switch-mode"></label>-->
			
			<a href="#" class="profile">
				<img src="img/people.png" align="right">
			</a>
            <a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>

		</nav>
		<!-- NAVBAR -->

        <!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<!--<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>-->
				</div>
				<!--<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>-->
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
									<td><span class="status completed"><?php echo $event->Status; ?></span></td>
								</tr>
							<?php endforeach; ?>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Partners</h3>
						<!--<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>-->
					</div>
					<ul class="todo-list">

						<a href="<?php echo URLROOT ?>/users/getPhotographers">
							<li class="completed">
							<h2>Photographers</h2>
							<p>10</p>
								<i class='bx bx-dots-vertical-rounded' ></i>
							</li>
						</a>

						<a href="<?php echo URLROOT ?>/users/getEditors">
							<li class="completed">
							<h2>Editors</h2>
							<p>5</p>
								<i class='bx bx-dots-vertical-rounded' ></i>
							</li>
						</a>

						<a href="<?php echo URLROOT ?>/users/getPrintingFirms">	
							<li class="not-completed">
							<h2>Printing Firms</h2>
								<p>2</p>
								<i class='bx bx-dots-vertical-rounded' ></i>
							</li>
						</a>
					</ul>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="/js/manager/script.js"></script>
</body>
</html>













