<?php 
	include('../functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<header>
	<img src="../images/logo.jpg" align="left" width="120" height="60">
	<h1 align="center">Admin Dashboard</h1>
	<br>
	<h6 align="left">Asset Management System</h6>
	</header>
</head>
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
}
</style>
<body>
		<!-- logged in user information -->
		<div class="profile_info" align="right">
			<div align="right"><img src="../images/admin_profile.png" align="right"></div>

			<div align="right">
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="home.php?logout='1'" style="color: red;">Logout</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
<style>
	.btn {
	padding: 20px;
	font-size: 30px;
	color: white;
	background: #00338D;
	border: none;
	border-radius: 5px;
	font: inherit;
}
</style>
<br>
<div align="center">
<input type='button'value='Add Employee' class="btn" onclick="document.location.href='addemployee.php';"/>
<input type='button'value='Remove Employee' class="btn" onclick="document.location.href='removeemployee.php';"/>
<input type='button'value='Add Asset' class="btn" onclick="document.location.href='addasset.php';"/>
<br><br>
<input type='button'value='Add Software Asset' class="btn" onclick="document.location.href='addsoftwareasset.php';"/>
<input type='button'value='Remove Asset' class="btn" onclick="document.location.href='removeasset.php';"/>
<input type='button'value='View Logs' class="btn" onclick="document.location.href='viewlogs.php';"/>
<br><br>
<input type='button'value='Remove Asset Using QR Scanner' class="btn" onclick="document.location.href='../removastusingqr.php';"/>
<br>
</div>
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