<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!doctype html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.5, shrink-to-fit=yes">
    <title>Return Asset Asset</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<header>
	<img src="images/logo.jpg" align="left" width="120" height="60">
	<br>
	<h1 align="center">Return Asset</h1>
	<h6 align="left">Asset Management System</h6>
	<div align="right">
	<?php
        echo '<a href= "index.php">Return to Dashborad</a>';
    ?>
</div>
	</header>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="all.css">
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
      <script src="jquery-3.4.1.min.js"></script>
	<div class="bg-light border-bottom shadow-sm sticky-top">
	</div>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
			</div>
			
			<div class="col">
				<script src="instascan.min.js"></script>
                                <h4 style="color:DarkBlue;" align="center"> Please scan the QR code here </h4>
                                <br>
				<div class="col-sm-12">
					<video id="preview" class="p-1 border" style="width:100%;"></video>
				</div>
                                <br>
				<script type="text/javascript">

					var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
					scanner.addListener('scan',function(content){
						//alert(content);
						var string = content;
						var obj = new Array();
						var arr = string.split('\n');
						for(var x=0; x<arr.length;x++){
							var temp = arr[x].split(':');
							obj[temp[0]] = temp[1]
						}
					    var asset_id = obj['AssetID'];
					   if(obj['Validate'] == ' @KpMgCyBeRDeFeNse')
					    {
					    	window.location.href = "updatereturn.php?aid=" + asset_id;
					    }
					    else
					    {
					    	window.location.href = "error.php";
					    }
					});
					Instascan.Camera.getCameras().then(function (cameras){
						if(cameras.length>0){
							scanner.start(cameras[0]);
							$('[name="options"]').on('change',function(){
								if($(this).val()==1){
									if(cameras[0]!=""){
										scanner.start(cameras[0]);
									}else{
										alert('No Front camera found!');
									}
								}else if($(this).val()==2){
									if(cameras[1]!=""){
										scanner.start(cameras[1]);
									}else{
										alert('No Back camera found!');
									}
								}
							});
						}else{
							console.error('No cameras found.');
							alert('No cameras found.');
						}
					}).catch(function(e){
						console.error(e);
						alert(e);
					});
				</script>
				<div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
				  <label class="btn btn-primary active">
					<input type="radio" name="options" value="1" autocomplete="off" checked><b> Front Camera </b>
				  </label>
				  <label class="btn btn-secondary">
					<input type="radio" name="options" value="2" autocomplete="off"> <b> Rear Camera </b>
				  </label>
				</div>
			</div>
			
			
			<div class="col-sm-3"> 
				
			</div>
		
		</div>
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
