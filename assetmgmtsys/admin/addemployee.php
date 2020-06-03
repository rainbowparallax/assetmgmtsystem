<?php
	include('../functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}
?>
<html>
<head>
<meta charset="UTF-8">
<title>Add Employee</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<header>
	<img src="../images/logo.jpg" align="left" width="120" height="60">
	<h1 align="center">Add Employee</h1>
	<br>
	<h6 align="left">Asset Management System</h6>
	<div align="right">
	<?php
        echo '<a href= "home.php">Return to Dashborad</a>';
    ?>
</div>
	</header>
<style>
header {
  background-color: transparent;
  padding: 30px;
  text-align: center;
  font-size: 100px;
  color: #00338D;
  font: inherit;
}
footer{
  background-color: transparent;
  padding:30px;
  text-align: center;
  border-top:1px solid #e5e5e5;
  font-size: 10px;
  color: #00338D;
  font: Univers for KPMG;
}
a{
padding: 20px;
	font-size: 30px;
	color: white;
	background: #808080;
	border: none;
	border-radius: 5px;
}
</style>
</head>
<body>
<div class="header">
		<h2>Add Employee</h2>
	</div>
	
	<form method="post" action="addemployeebackend.php">

		<?php echo display_error(); ?>
		<div class="input-group">
			<label>Employee ID</label>
			<input type="text" name="empid" value="<?php echo $empid; ?>" required autocomplete="off">
		</div>
		<div class="input-group">
			<label>Employee Name</label>
			<input type="text" name="empname" value="<?php echo $empname; ?>" required autocomplete="off">
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>" required autocomplete="off">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>" required autocomplete="off">
		</div>
		<div class="input-group">
			<label>Work Location</label>
			<input type="text" name="workloc" value="<?php echo $workloc; ?>" required autocomplete="off">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" required autocomplete="off">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" required autocomplete="off">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="add">Add Employee</button>
		</div>
	</form>
<br>
<footer>
<div class="footer-footerText">
<div class="footer-footerText-content">
<p>© 2020 KPMG, an Indian registered partnership and a member firm of the KPMG network of independent member firms affiliated with KPMG International Cooperative (“KPMG International”), a Swiss entity. All rights reserved.</p>
</div>
</div>
</footer>
</body>
</html>