<?php
	require("functions.php");
	session_start();
	#fetch data from database
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"h10_lostfound");
	$name = "";
	$email = "";
	$mobile = "";
	$query = "select * from admins where email = '$_SESSION[email]'";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)){
		$name = $row['name'];
		$email = $row['email'];
		$mobile = $row['mobile'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add New Item</title>
	<meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
  	<script type="text/javascript">
  		function alertMsg(){
  			alert("Item Added Succesfully");
  			window.location.href = "admin_dashboard.php";
  		}
  	</script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="admin_dashboard.php">H10 Lost and Found</a>
			</div>
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="">View Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="#">Edit Profile</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="change_password.php">Change Password</a>
	        	</div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="../logout.php">Logout</a>
		      </li>
		    </ul>
		</div>
	</nav><br>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
		<div class="container-fluid">
			
		    <ul class="nav navbar-nav navbar-center">
		      <li class="nav-item">
		        <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Items </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_item.php">Add New Item</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_items.php">Manage Item</a>
	        	</div>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Category </a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_cat.php">Add New Category</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_cat.php">Manage Category</a>
	        	</div>
		      </li>
		      <li class="nav-item dropdown">
	        	<a class="nav-link dropdown-toggle" data-toggle="dropdown">Finders</a>
	        	<div class="dropdown-menu">
	        		<a class="dropdown-item" href="add_finder.php">Add New Finder</a>
	        		<div class="dropdown-divider"></div>
	        		<a class="dropdown-item" href="manage_finders.php">Manage Finders</a>
	        	</div>
		      </li>
	          <li class="nav-item">
		        <a class="nav-link" href="issue_item.php">Issue Item</a>
		      </li>
		    </ul>
		</div>
	</nav><br>
	<span><marquee>This is the H10 Lost and Found. Any Lost and Found items can be documented here</marquee></span><br><br>
		<center><h4>Add a new Item</h4><br></center>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="" method="post">
					<div class="form-group">
						<label for="email">Item Name:</label>
						<input type="text" name="item_name" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="mobile">Finder ID:</label>
						<input type="text" name="item_finder" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="mobile">Category ID:</label>
						<input type="text" name="item_category" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="mobile">Item Number:</label>
						<input type="text" name="item_no" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="mobile">Item value:</label>
						<input type="text" name="item_value" class="form-control" required>
					</div>
					<button type="submit" name="add_item" class="btn btn-primary">Add Book</button>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
</body>
</html>

<?php
	if(isset($_POST['add_item']))
	{
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"h10_lostfound");
		$query = "insert into items values(null,'$_POST[item_name]','$_POST[item_finder]','$_POST[item_category]',$_POST[item_no],$_POST[item_price])";
		$query_run = mysqli_query($connection,$query);
		#header("location:add_book.php");
	}
?>
