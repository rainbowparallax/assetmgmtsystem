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
<title>Add Employee</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<header>
	<img src="../images/logo.jpg" align="left" width="120" height="60">
	<h1 align="center">Add Employee</h1>
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
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$workloc     =  e($_POST['workloc']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);
	// form validation: ensure that the form is correctly filled
		if (empty($empid)) { 
			array_push($errors, "Employee ID is required"); 
		}
		if (empty($empname)) { 
			array_push($errors, "Employee Name is required"); 
		}
		if (empty($username)) { 
			array_push($errors, "Username is required"); 
		}
		if (empty($email)) { 
			array_push($errors, "Email is required"); 
		}
		if (empty($workloc)) { 
			array_push($errors, "Work Location is required"); 
		}
		if (empty($password_1)) { 
			array_push($errors, "Password is required"); 
		}
		// Validate password strength
		$uppercase = preg_match('@[A-Z]@', $password_1);
		$lowercase = preg_match('@[a-z]@', $password_1);
		$number    = preg_match('@[0-9]@', $password_1);
		$specialChars = preg_match('/[~!@&_.,]/', $password_1);
		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password_1) < 8) {
		    array_push($errors,"Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one of these special character(~!@&_.,)");
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);

			$query = "INSERT INTO users (`empid`, `empname`, `username`, `email`, `workloc`, `user_type`, `password`) 
						  VALUES ('$empid', '$empname', '$username', '$email', '$workloc', 'user', '$password')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "New user successfully created!!";
				echo nl2br("\n"); echo 'User has been added successfully'; echo nl2br("\n");	
		}
		else
		{
			echo 'User not created';
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
