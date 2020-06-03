<?php
include('../functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}
?>
<!doctype html>
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
	background: #808080;
	border: none;
	border-radius: 5px;
}
</style>
</head>
<body>
<div style="color:DarkBlue; font-size:180%;"  align="center">
<?php
	
	$empid 		 =  e($_POST['empid']);
	$empname 	 =  e($_POST['empname']);
	$email       =  e($_POST['email']);

	$query = "DELETE FROM users WHERE empid='$empid' and empname='$empname' and email='$email'";
	mysqli_query($db,$query);
		if(mysqli_affected_rows($db) == 1) 
		{
			echo nl2br("\n");
			echo 'Employee has been removed successfully';
		}
		else 
		{
			echo nl2br("\n");
			echo 'Error occured: Employee not removed'; echo nl2br("\n");
			echo 'Try again'; echo nl2br("\n");
		}

?>
</div>
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
