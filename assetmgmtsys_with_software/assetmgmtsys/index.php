<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<header>
	<img src="images/logo.jpg" align="left" width="120" height="60">
	<br>
	<h1 align="center">Dashboard</h1>
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
</style>
<body>
		<!-- logged in user information -->
		<div class="profile_info" align="right">
			<div align="right"><img src="images/user_profile.png" align="right"></div>

			<div align="right">
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">Logout</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>
<style>
	.btn {
	padding: 30px;
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
<input type='button'value='Request Asset' class="btn" onclick="document.location.href='indexrequest.php';"/>
<input type='button'value='Return Asset' class="btn" onclick="document.location.href='indexreturn.php';"/>
<input type='button'value='Request Software Asset' class="btn" onclick="document.location.href='requestsoftwareasset.php';"/>
<br> <br>
<input type='button'value='Available Assets' class="btn" onclick="document.location.href='availability.php';"/>
<input type='button'value='My Activity' class="btn" onclick="document.location.href='activity.php';"/>
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