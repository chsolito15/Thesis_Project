<?php
	session_start();
	if(!isset($_SESSION["user_id"])) {
		header("Location: index.php");
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<title>POS - View Product</title>
		<!-- bootstrap css -->
		<link rel="stylesheet" href="plugins/bootstrap-4.3.1-dist/css/bootstrap.min.css">
		<!-- fontawesome css -->
		<link rel="stylesheet" href="plugins/fontawesome-free-5.11.2-web/css/all.css">
		<!-- Chart css -->
		<link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
		<!-- custom css -->
		<link rel="stylesheet" href="css/styles.css" />
	</head>
	<body>
	
		<nav class="navbar navbar-expand-lg navbar-light">
		  <a class="navbar-brand" href="dashboard.php">
			<img src="images/logo2.jpg" id="logo-dash"/>
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item">
				<a class="nav-link nav-link-labels" href="dashboard.php"><i class="fas fa-home"></i> Home</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link nav-link-labels" href="products.php"><i class="fas fa-smoking"></i> Products</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link nav-link-labels" href="cashier.php"><i class="fab fa-cuttlefish"></i> Cashier</a>
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
			<h4>View Product</h4>
			
			<?php
				$item_id = $_GET["id"];
				$target_dir = "../images/products/";
				$sql = "SELECT * FROM products WHERE id = ".$item_id;
				
				//Connect to database
				$DB_SERVER = 'localhost';
				$DB_USERNAME = 'root';
				$DB_PASSWORD = '';
				$DB_DATABASE = 'pos';
				$con = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
				
				$result = mysqli_query($con, $sql);
				
				if ($result) {
					//delete image
					$row = mysqli_fetch_array($result);
				}
				
				mysqli_close($con);
			?>
			
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" name="name" value="<?php echo $row["name"]; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<input type="text" class="form-control" name="description" value="<?php echo $row["description"]; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="model">Model</label>
				<input type="text" class="form-control" name="model" value="<?php echo $row["model"]; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="brand">Brand</label>
				<input type="text" class="form-control" name="brand" value="<?php echo $row["brand"]; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="qty">Quantity</label>
				<input type="text" class="form-control" name="qty" value="<?php echo $row["quantity"]; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="price">Price</label>
				<input type="text" class="form-control" name="price" value="<?php echo $row["price"]; ?>" readonly>
			</div>
			<div class="form-group">
				<label for="discount">Discount</label>
				<input type="text" class="form-control" name="discount" value="<?php echo $row["discount"]; ?>" readonly>
			</div>
			<label>Image</label>
			<img id="blah" src="images/products/<?php echo $row["image"]; ?>" style="display: block;"/>
			<br><br>
			
			<a href="products.php"><button class="btn btn-success"><i class="fas fa-arrow-left"></i> Back</button></a>

		</div>
		
		<footer>
		  <center>
			<p>&copy; Copyright <?php echo date('Y'); ?>. All rights reserved. Shotfired Vape Ammo.</p>
		  </center>
		</footer>
		
		<!-- bootstrap js -->
		<script src="js/jquery-3.3.1.slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="plugins/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
	</body>
</html>