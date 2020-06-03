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
<title>Remove Employee</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<header>
	<img src="../images/logo.jpg" align="left" width="120" height="60">
	<h1 align="center">Remove Employee</h1>
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
		<h2>Remove Employee</h2>
	</div>
	
	<form method="post" action="removeemployeebackend.php">

		<?php echo display_error(); ?>
		<div class="input-group">
			<label>Employee ID</label>
				<select name="empid" id="empid" required autocomplete="off" value="">
				<?php
					echo "<option></option>";
					$query = "SELECT empid from users";
					$result = mysqli_query($db,$query);
					while($rows = mysqli_fetch_assoc($result))
					{
						$empid = $rows['empid'];
						echo "<option value='$empid'>$empid</option>";
					}
				?>
			</select>
		</div>
		<div class="input-group">
			<label>Employee Name</label>
			<select name="empname" id="empname" required autocomplete="off" value="">
				<?php
					echo "<option></option>";
					$query = "SELECT empname from users WHERE user_type='user'";
					$result = mysqli_query($db,$query);
					while($rows = mysqli_fetch_assoc($result))
					{
						$empname = $rows['empname'];
						echo "<option value='$empname'>$empname</option>";
					}
				?>
			</select>
		</div>
		<div class="input-group">
			<label>Email</label>
			<select name="email" id="email" required autocomplete="off" value="">
				<?php
					echo "<option></option>";
					$query = "SELECT email from users WHERE user_type='user'";
					$result = mysqli_query($db,$query);
					while($rows = mysqli_fetch_assoc($result))
					{
						$email = $rows['email'];
						echo "<option value='$email'>$email</option>";
					}
				?>
			</select>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="add">Remove Employee</button>
		</div>
	</form>
</body>
<br>
<footer>
<div class="footer-footerText">
<div class="footer-footerText-content">
<p>© 2020 KPMG, an Indian registered partnership and a member firm of the KPMG network of independent member firms affiliated with KPMG International Cooperative (“KPMG International”), a Swiss entity. All rights reserved.</p>
</div>
</div>
</footer>
</html>