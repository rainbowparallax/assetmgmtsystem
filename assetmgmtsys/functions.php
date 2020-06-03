<?php 
	session_start();

	// connect to database
	$db = mysqli_connect('localhost:3308', 'kpmgsys', 'r00t!', 'kpmgsys');

	// variable declaration
	$empid 	  = "";
	$empname  = "";
	$username = "";
	$email    = "";
	$workloc = "";
	$errors   = array(); 

	//Asset variable decleration
	$AssetID = "";
	$Asset = "";
	$AssetClass = "";
	$AssetValue = "";
	$Description = "";
	$AssetCondition = "";
	$Availability = "";

	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}

	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
	}

	// REGISTER USER
	function register(){
		global $db, $errors;

		// receive all input values from the form
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
			$password = md5($password_1);//encrypt the password before saving in the database

			if (isset($_POST['user_type'])) {
				$user_type = e($_POST['user_type']);
				$query = "INSERT INTO users (`empid`, `empname`, `username`, `email`, `workloc`, `user_type`, `password`) 
						  VALUES ('$empid', '$empname', '$username', '$email', '$workloc', '$user_type', '$password')";
				mysqli_query($db, $query);
				$_SESSION['success']  = "New user successfully created!!";
				header('location: home.php');
			}else{
				$query = "INSERT INTO users (`empid`, `empname`, `username`, `email`, `workloc`, `user_type`, `password`) 
						  VALUES ('$empid', '$empname', '$username', '$email', '$workloc', 'user', '$password')";
				mysqli_query($db, $query);

				// get id of the created user
				$logged_in_user_id = mysqli_insert_id($db);

				$_SESSION['user'] = $logged_in_user_id; // put logged in user in session
				$_SESSION['success']  = "You are now logged in";
				header('location: login.php');				
			}

		}

	}

	// LOGIN USER
	function login(){
		global $db, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);

			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: admin/home.php');		  
				}else{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";

					header('location: index.php');
				}
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

?>