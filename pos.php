<?php
	session_start();
	if(!isset($_SESSION["user_id"])) {
		header("Location: index.php");
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<title>POS - Main</title>
		<!-- bootstrap css -->
		<link rel="stylesheet" href="plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css">
		<!-- fontawesome css -->
		<link rel="stylesheet" href="plugins/fontawesome-free-5.11.2-web/css/all.css">
		<!-- Chart css -->
		<link rel="stylesheet" href="css/Chart.min.css">
		<!-- custom css -->
		<link rel="stylesheet" href="css/styles.css" />
	</head>
	<body>
	
		<nav class="navbar navbar-expand-lg navbar-light">
		  <a class="navbar-brand" href="pos.php">
			<img src="images/logo2.jpg" id="logo-dash"/>
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<form class="form-inline my-2 my-lg-0">
			  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			  <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Search</button>
			</form>
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item">
				<a class="nav-link nav-link-labels" href="pos.php"><i class="fas fa-home"></i> Home</a>
			  </li>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <img src="images/users/<?php echo $_SESSION['image']; ?>" id="profile-img-dash"/>
				  Hi <?php echo $_SESSION['fname']; ?>!
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="#"><i class="fas fa-user-alt"></i> Profile</a>
				  <a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="php/logout.php"><i class="fas fa-sign-out-alt"></i> Log out</a>
				</div>
			  </li>
			</ul>
		  </div>
		</nav>
		
		<div id="container">
			POS page is under construction
		</div>
		
		<footer>
		  <center>
			<p>&copy; Copyright <?php echo date('Y'); ?>. All rights reserved. Shotsfired Vape Ammo.</p>
		  </center>
		</footer>
		
		<!-- bootstrap js -->
		<script src="js/jquery-3.3.1.slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
		<!-- Chart js -->
		<script src="js/Chart.min.js"></script>
		<script>
		var ctx = document.getElementById('myChart');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ['May', 'June', 'July', 'August', 'September', 'October'],
				datasets: [{
					label: 'Sales last 6 months',
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
		</script>
	</body>
</html>