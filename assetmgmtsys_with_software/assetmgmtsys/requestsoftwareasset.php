<?php
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<html>
<head>
<meta charset="UTF-8">
<title>Remove Asset</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<header>
	<img src="images/logo.jpg" align="left" width="120" height="60">
	<h1 align="center">Request Software Asset</h1>
	<br>
	<h6 align="left">Asset Management System</h6>
	<div align="right">
	<?php
        echo '<a href= "index.php">Return to Dashborad</a>';
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
<br><br>
<div class="header">
		<h2>Remove Asset</h2>
	</div>
	
	<form method="post" action="requestsoftwareassetbackend.php">

		<?php echo display_error(); ?>
		<div class="input-group">
			<label>Sofware Name</label>
			<select name="SoftwareName" id="SoftwareName" required autocomplete="off" value="">
				<?php
					echo "<option></option>";
					$query = "SELECT SoftwareName from softwareassets";
					$result = mysqli_query($db,$query);
					while($rows = mysqli_fetch_assoc($result))
					{
						$SoftwareName = $rows['SoftwareName'];
						echo "<option value='$SoftwareName'>$SoftwareName</option>";
					}
				?>
			</select>
		</div>
		<div class="input-group">
			<label>From Date</label>
			<input type="text" name="FromDate" value="<?php echo $FromDate; ?>" required autocomplete="off">
		</div>
		<div class="input-group">
			<label>To Date</label>
			<input type="text" name="ToDate" value="<?php echo $ToDate; ?>" required autocomplete="off">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="add">Request Asset</button>
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