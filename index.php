<?php
	session_start();
	
	if(isset($_SESSION["user_type"])) {
		
		if($_SESSION["user_type"] == 1) {
			header("Location: dashboard.php");
		} else {
			header("Location: pos.php");
		}
	}
?>
<!doctype html>

<html lang="en">
	<head>
		<title>POS</title>
		<!-- bootstrap css -->
		<link rel="stylesheet" href="plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css">
		<!-- fontawesome css -->
		<link rel="stylesheet" href="plugins/fontawesome-free-5.11.2-web/css/all.css">
		<!-- custom css -->
		<link rel="stylesheet" href="css/styles.css" />
	</head>
	<body id="login-body">
	
		<div id="login-form">
			<img id="logo-login" src="images/logo.jpg" />
			
			<form action="php/login.php" method="post">
				<div class="form-group">
					<input type="text" class="form-control" name="username" placeholder="Username" required>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
				</div>
				<?php
					if(isset($_GET["user"])) {
						if($_GET["user"] == "invalid") {
							echo '
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
								  <i class="fas fa-exclamation-circle"></i> Invalid credentials.
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								  </button>
								</div>
							';
						}
					}
				?>
				<button type="submit" class="btn btn-primary">
					<i class="fas fa-sign-in-alt"></i> Log in
				</button>
			</form>
		</div>
			
		<!-- bootstrap js -->
		<script src="js/jquery-3.3.1.slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
	</body>
</html>