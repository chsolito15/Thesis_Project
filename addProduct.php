<?php
	session_start();
	if(!isset($_SESSION["user_id"])) {
		header("Location: index.php");
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<title>POS - Add Product</title>
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
			<h4>Add Product</h4>
			<form method="POST" action="php/addProduct.php" enctype="multipart/form-data" runat="server">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" name="name" placeholder="Name" required>
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<input type="text" class="form-control" name="description" placeholder="Description" required>
				</div>
				<div class="form-group">
					<label for="model">Model</label>
					<input type="text" class="form-control" name="model" placeholder="Model" required>
				</div>
				<div class="form-group">
					<label for="brand">Brand</label>
					<input type="text" class="form-control" name="brand" placeholder="Brand" required>
				</div>
				<div class="form-group">
					<label for="qty">Quantity</label>
					<input type="text" class="form-control" name="qty" placeholder="Quantity" required>
				</div>
				<div class="form-group">
					<label for="price">Price</label>
					<input type="text" class="form-control" name="price" placeholder="Price" required>
				</div>
				<div class="form-group">
					<label for="discount">Discount</label>
					<input type="text" class="form-control" name="discount" placeholder="Discount" required>
				</div>
				<label>Image</label>
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="customFile" name="image" required>
					<label id="imagePath" class="custom-file-label" for="customFile">Upload image</label>
				</div>
				<img id="blah" src="#" alt="&nbsp;Upload image" />
				<br><br>
				<button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
			</form>
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
		<script>
			function readURL(input) {
			  if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#blah').attr('src', e.target.result);
					$('#blah').css('display', 'block');
				}
				reader.readAsDataURL(input.files[0]);
			  }
			}

			$("#customFile").change(function() {
			  readURL(this);
			});
		</script>
	</body>
</html>