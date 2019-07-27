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
				<li><p class="navbar-text"><strong>Account Management!</strong> You're signed in as <strong><?php echo $_SESSION['user_name']; ?></strong></p></li>
				<li><a href="reservation.php">Manage Users/Customers</a></li>
				<li><a href="reservation.php">Manage Existing Reservations</a></li>
				<li><a href="reservation.php">Manage Cars</a></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } elseif (isset($_SESSION['user_id'])) { ?>
				<li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['user_name']; ?></strong></p></li>
				<li><a href="reservation.php">Make New Reservation</a></li>
				<li><a href="profile.php">Manage Account</a></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<?php } ?>
			</ul>
		</div>
		
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Update Profile</legend>

					<div class="form-group">
						<label for="name">Name</label> <?php echo $_SESSION['user_name']; ?>
						<input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($uname_error)) echo $uname_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Address</label>
						<input type="text" name="address" placeholder="Enter Full Address" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($uaddress_error)) echo $uaddress_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Phone Number</label>
						<input type="text" name="address" placeholder="Enter Phone #" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($uphone_error)) echo $uphone_error; ?></span>
					</div>					
					
					<div class="form-group">
						<label for="name">Email</label> <?php echo $_SESSION['email']; ?>
						<input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<label for="name">Confirm Password</label>
						<input type="password" name="cpassword" placeholder="Confirm Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="update" value="update" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
		
</div>	
