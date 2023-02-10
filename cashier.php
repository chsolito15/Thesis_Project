<?php
	session_start();
	if(!isset($_SESSION["user_id"])) {
		header("Location: index.php");
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<title>POS - Cashier</title>
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
			<?php			
				if(isset($_GET["add"])) {
					if($_GET["add"] == "false") {
						echo '
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  <strong>Add error!</strong> An error has occured. Please try again.r5r%r$%r5r%r$%r	
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
						';
					} else {
						echo '
							<div class="alert alert-success alert-dismissible fade show" role="alert">
							  <strong>Add successful!</strong> Cashier added to the database.
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
						';
					}
				}
				
				if(isset($_GET["del"])) {
					if($_GET["del"] == "false") {
						echo '
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  <strong>Delete error!</strong> An error has occured. Please try again.r5r%r$%r5r%r$%r	
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
						';
					} else {
						echo '
							<div class="alert alert-success alert-dismissible fade show" role="alert">
							  <strong>Delete successful!</strong> Cashier deleted to the database.
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
						';
					}
				}
				
				if(isset($_GET["update"])) {
					if($_GET["update"] == "false") {
						echo '
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  <strong>Update error!</strong> An error has occured. Please try again.r5r%r$%r5r%r$%r	
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
						';
					} else {
						echo '
							<div class="alert alert-success alert-dismissible fade show" role="alert">
							  <strong>Update successful!</strong> Cashier Updated to the database.
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
						';
					}
				}
				
			?>
			<a href="addCashier.php">
				<button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Add Cashier</button>
			</a>
			<br><br>
			<table id="products-table" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Image</th>
						<th>Username</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql = "SELECT * FROM users WHERE user_type=0";
						//Connect to database
						$DB_SERVER = 'localhost';
						$DB_USERNAME = 'root';
						$DB_PASSWORD = '';
						$DB_DATABASE = 'pos';
						$con = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
						$result = mysqli_query($con, $sql);
						while($row = mysqli_fetch_array($result)){
							echo '
								<tr>
									<td>
										<img src="images/users/'.$row["image"].'" class="prod-img-tbl" />
									</td>
									<td>'.$row["username"].'</td>
									<td>'.$row["email"].'</td>
									<td>
										<a href="viewCashier.php?id='.$row["id"].'"><button class="btn btn-primary delButton" title="View"><i class="fas fa-eye"></i></button></a>
										<a href="editCashier.php?id='.$row["id"].'"><button class="btn btn-secondary delButton" title="Update"><i class="fas fa-pencil-alt"></i></button></a>
										<button class="btn btn-danger delButton" user_id='.$row["id"].' title="Delete"><i class="fas fa-trash"></i></button>
									</td>
								</tr>
							';
						}
						mysqli_close($con);
					?>
				</tbody>
				<tfoot>
					<tr>
						<th>Image</th>
						<th>Username</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete item</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				Are you sure you want to delete user?
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				<button type="button" class="btn btn-primary modal-yes">Yes</button>
			  </div>
			</div>
		  </div>
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
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap4.min.js"></script>
		<script>
			$(document).ready(function() {
				var deleteUserId = null;
				$('#products-table').DataTable();
				$('.delButton').click(function(){
					deleteUserId = $(this).attr("user_id");
					$('#delModal').modal('show');
					$('.modal-yes').click(function() {
						window.location.href = "php/deleteCashier.php?id="+deleteUserId;
					});
				});
			} );
		</script>
	</body>
</html>