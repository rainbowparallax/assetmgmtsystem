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
<title>View Logs</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <header>
  <img src="../images/logo.jpg" align="left" width="120" height="60">
  <h1 align="center">View Logs</h1>
  <br>
  <h6 align="left">Asset Management System</h6>
  <div align="right">
  <?php
        echo '<a href= "home.php">Return to Dashborad</a>';
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
</style>
<body>
<br> <br>
<div align="center">
<table align="center" border="1px" style= "width:1000px; line-height:40px;">
      <tr>
      	<t>
      		<th> Employee ID </th>
          <th> Employee Name </th>
          <th> Mail ID </th>
      		<th> Asset ID </th>
          <th> Asset </th>
          <th> Description </th>
      		<th> Status </th>
      		<th> Time Stamp </th>
      	</t>
      </tr>
      	<?php
      		global $db;
      		
      		$query = "SELECT * FROM booking ORDER BY Time_Stamp";
			$result = mysqli_query($db,$query);
			if(!($result)){
				echo "Falied to fetch data";
			}
			else {
      		while($rows = mysqli_fetch_assoc($result))
      		{
      	?>
      	<tr align="center">
      		<td><?php echo $rows['EmployeeID']; ?></td>
          <td><?php echo $rows['EmployeeName']; ?></td>
          <td><?php echo $rows['MailID']; ?></td>
      		<td><?php echo $rows['AssetID']; ?></td>
          <td><?php echo $rows['Asset']; ?></td>
          <td><?php echo $rows['Description']; ?></td>
      		<td><?php echo $rows['Status']; ?></td>
      		<td><?php echo $rows['Time_Stamp']; ?></td>
      	</tr>
      	<?php
      	}
        }
      	?>
    </table>
</div>
<br>
<style> 
a{
padding: 20px;
font-size: 30px;
color: white;
background: #808080;
border: none;
border-radius: 5px;
}
</style>
</center>
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
