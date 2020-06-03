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
<title>Add Asset</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<header>
	<img src="../images/logo.jpg" align="left" width="120" height="60">
	<h1 align="center">Add Asset</h1>
	<br>
	<h6 align="left">Asset Management System</h6>
	<div align="right">
	
<div class="footer">
  <p>&copy; KPMG</p>
</div>
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

	$AssetID = e($_POST['AssetID']);
	$Asset = e($_POST['Asset']);
	$AssetClass = e($_POST['AssetClass']);
	$AssetValue = e($_POST['AssetValue']);
	$Description = e($_POST['Description']);
	$AssetCondition = e($_POST['AssetCondition']);
	$Availability = e($_POST['Availability']);
    $AssetID = ' '.$AssetID;

	$query = "INSERT INTO asset (AssetID, Asset, AssetClass, AssetValue, Description, AssetCondition, Availability) VALUES ('$AssetID', '$Asset', '$AssetClass', '$AssetValue', '$Description', '$AssetCondition', '$Availability')";
	
	if(mysqli_query($db, $query)) {
		echo nl2br("\n");
		echo 'Asset has been added successfully'; echo nl2br("\n");
	}
	else {
		echo nl2br("\n");
		echo 'Error occured: Asset not added'; echo nl2br("\n");
		echo 'Try again'; echo nl2br("\n");
	}

?>
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
