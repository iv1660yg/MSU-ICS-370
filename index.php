<?php 
session_start();
include('header.php');
include_once("db_connect.php");
?>


<div class="container">
	<h2 align=center>ICS Group Project - Car Rental System</h2>	
		
		<br>
		<br>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-left">
				<?php if ((isset($_SESSION['user_id']) AND (($_SESSION['account_type'])=="admin" ) )) { ?>
				<li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['fullname']; ?></strong></p></li>
				<li><a href="users/users.php">Manage Users/Customers</a></li>
				<li><a href="reservation.php">Manage Existing Reservations</a></li>
				<li><a href="cars/cars.php">Manage Cars</a></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } elseif (isset($_SESSION['user_id'])) { ?>
				<li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['fullname']; ?></strong></p></li>
				<li><a href="reservation.php">Make New Reservation</a></li>
				<li><a href="profile.php">Manage Account</a></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<div>
				<img align="center" src="img/imghome.jpg" alt="">
				</div>
				<?php } ?>
			</ul>
		</div>
		
		
</div>	
