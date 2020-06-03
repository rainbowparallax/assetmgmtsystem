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
<title>Add Asset</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<header>
	<img src="../images/logo.jpg" align="left" width="120" height="60">
	<h1 align="center">Add Asset</h1>
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
		<h2>Add Asset</h2>
	</div>
	
	<form method="post" action="addassetbackend.php">

		<?php echo display_error(); ?>
		<div class="input-group">
			<label>Asset ID</label>
			<input type="text" name="AssetID" value="<?php echo $AssetID; ?>" required autocomplete="off">
		</div>
		<div class="input-group">
			<label>Asset</label>
			<input type="text" name="Asset" value="<?php echo $Asset; ?>" required autocomplete="off">
		</div>
		<div class="input-group">
			<label>Asset Class</label>
			<input type="text" name="AssetClass" value="<?php echo $AssetClass; ?>" required autocomplete="off">
		</div>
		<div class="input-group">
			<label>Asset Value</label>
			<select name="AssetValue" id="AssetValue" required autocomplete="off">
				<option value=""></option>
				<option value="High">High</option>
				<option value="Medium">Medium</option>
				<option value="Low">Low</option>
			</select>
		</div>
		<div class="input-group">
			<label>Description</label>
			<input type="text" name="Description" value="<?php echo $Description; ?>" required autocomplete="off">
		</div>
		<div class="input-group">
			<label>Asset Condition</label>
			<select name="AssetCondition" id="AssetCondition" required autocomplete="off">
				<option value=""></option>
				<option value="Working">Working</option>
				<option value="Not in Use">Not in Use</option>
				<option value="Not Working">Not Working</option>
			</select>
		</div>
		<div class="input-group">
			<label>Asset Availability</label>
			<select name="Availability" id="Availability" required autocomplete="off">
				<option value=""></option>
				<option value="Available">Available</option>
				<option value="Not Available">Not Available</option>
			</select>
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="add">Add Asset</button>
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