<?php
include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Error</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<header>
	<img src="images/logo.jpg" align="left" width="120" height="60">
	<h1 align="center">Error</h1>
  <br>
	<h6 align="left">Asset Management System</h6>
	<div align="right">
	<?php
        echo '<a href= "index.php">Return to Dashborad</a>';
    ?>
</div>
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
a{
padding: 20px;
font-size: 30px;
color: white;
background: #00338D;
border: none;
border-radius: 5px;
}
</style>
<body>
<img src="images/logo.png" width="120" height="60" align="left">
<h1 style="color:DarkBlue;" align="right"> <b> User </b> </h1>
<div style="color:DarkBlue; font-size:180%;"  align="center">
<?php

		echo "Error: The device you want to Check In / Check Out is Invalide"; echo nl2br("\n"); echo nl2br("\n");
		echo "Please Contact Administrator for further clarification"; echo nl2br("\n"); echo nl2br("\n");
?>
</div>
<footer>
<div class="footer-footerText">
<div class="footer-footerText-content">
<p>© 2020 KPMG, an Indian registered partnership and a member firm of the KPMG network of independent member firms affiliated with KPMG International Cooperative (“KPMG International”), a Swiss entity. All rights reserved.</p>
</div>
</div>
</footer>
</body>
</html>
