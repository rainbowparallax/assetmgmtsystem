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
<title>Request Asset</title>
<link rel="stylesheet" type="text/css" href="style.css">
	<header>
	<img src="images/logo.jpg" align="left" width="120" height="60">
	<h1 align="center">Request Asset</h1>
	<br>
	<h6 align="left">Asset Management System</h6>
	<div align="right">
	
<div class="footer">
  <p>&copy; KPMG</p>
</div>
	<?php
        echo '<a href= "index.php">Return to Dashborad</a>';
    ?>
</div>
	</header>
</head>
<br>
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
	global $db;

	$asset_id = $_GET['aid'];
	$username = $_SESSION['user']['username'];
	$empname = $_SESSION['user']['empname'];
	$email = $_SESSION['user']['email'];
	$status = "Check Out";
	$empid = $_SESSION['user']['empid'];

	$query = "SELECT Asset, Description, Availability FROM asset WHERE AssetID='$asset_id'";
	$result = mysqli_query($db, $query);
	while($row = mysqli_fetch_array($result)) {
		$asset = $row['Asset'];
		$desp = $row['Description'];
		$aval = $row['Availability'];
	}

	if($aval == 'Available') {
		$sql1 = "INSERT INTO booking (EmployeeID, EmployeeName, MailID, AssetID, Asset, Description, Status, Time_Stamp) VALUES ('$empid', '$empname', '$email', '$asset_id', '$asset', '$desp', '$status', now())";
		if(!mysqli_query($db, $sql1)) {
			echo 'Error: Not Inserted'; echo nl2br("\n"); echo nl2br("\n");
		}
		else {
			$sql2 = "UPDATE asset SET `Availability`='Not Available' WHERE `AssetID` LIKE '$asset_id'";
			$sql3 = "SELECT AssetID, Asset, Description, AssetCondition from asset WHERE `AssetID` LIKE '$asset_id'";
			if (mysqli_query($db, $sql2) && mysqli_query($db,$sql3)) {
	    		$result1 = mysqli_query($db, $sql3);
				while($row = mysqli_fetch_array($result1)) {
					echo 'Asset ID:	'; echo $row['AssetID']; echo nl2br("\n");
					echo 'Asset:	'; echo $row['Asset']; echo nl2br("\n");
					echo 'Description:	'; echo $row['Description']; echo nl2br("\n");
					echo 'Asset Condition:	'; echo $row['AssetCondition']; echo nl2br("\n"); echo nl2br("\n");
				}
	    		echo 'Successfully Checked Out the Asset!'; echo nl2br("\n"); echo nl2br("\n");
			}
			else {
	    		echo "Error updating record"; echo nl2br("\n"); echo nl2br("\n");
			}
		}
	}
	elseif ($aval == 'Not Available') {
		echo "Asset Not Availabe"; echo nl2br("\n"); echo nl2br("\n"); 
	}
	else {
		echo "Error: Asset your trying to Check Out is Invalid"; echo nl2br("\n"); echo nl2br("\n");
		echo "Contact Administrator"; echo nl2br("\n"); echo nl2br("\n");
	}
?>
</div>
<?php
	echo '<center><a href= "indexrequest.php">Request another Asset</a></center>'; echo nl2br("\n"); echo nl2br("\n");
?>
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
