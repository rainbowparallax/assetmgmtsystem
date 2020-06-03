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
<title>Remove Asset</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<header>
	<img src="../images/logo.jpg" align="left" width="120" height="60">
	<h1 align="center">Remove Asset</h1>
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
    $aval = "";
	$AssetID = e($_POST['AssetID']);
	$Asset = e($_POST['Asset']);
	$AssetClass = e($_POST['AssetClass']);
    $AssetID = ' '.$AssetID;
    
    $sql = "SELECT Availability FROM asset WHERE AssetID='$AssetID' and Asset='$Asset' and AssetClass='$AssetClass'";
    $result = mysqli_query($db, $sql);
    while($rows = mysqli_fetch_array($result)) {
		$aval = $rows['Availability'];
	}
    
	if ($aval == 'Available') {
		$query = "DELETE FROM asset WHERE AssetID='$AssetID' and Asset='$Asset' and AssetClass='$AssetClass'";
		
		if(mysqli_query($db, $query)) {
			echo nl2br("\n");
			echo 'Asset has been removed successfully';
		}
		else {
			echo nl2br("\n");
			echo 'Error occured: Asset not removed'; echo nl2br("\n");
			echo 'Try again'; echo nl2br("\n");
		}
	}
	else {
		echo nl2br("\n");
		echo 'The Asset you are trying to remove is currently being used or it is Invalid'; echo nl2br("\n"); echo nl2br("\n");
		echo 'Check the logs for details'; echo nl2br("\n");
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
