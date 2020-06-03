<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<br>
<br>
<br>
<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Dashboard</a>
  <a href="indexrequest.php">Request Asset</a>
  <a href="indexreturn.php">Return Asset</a>
  <a href="availablilty.php">Check Available Assets</a>
  <a href="activity.php">User Activity</a>

  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<style>
.topnav {
  background-color: #1245a8;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  font-family: KPMG;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: white;
  color: black;
}

/* Add an active class to highlight the current page */
.topnav a.active {
  background-color: #ddd;
  color: white;
}

/* Hide the link that should open and close the topnav on small screens */
.topnav .icon {
  display: none;
}
</style>
<script>
<function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
} 
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
} 
</script>
</head>