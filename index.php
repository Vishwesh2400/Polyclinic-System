<!DOCTYPE html>
<html>
<head>
	<title>HMS Home Page</title>
</head>

<body>
	<?php
	session_start();
	include("include/header.php");
	?>

<div class="margin-top">
<div class="container">
	<div class="col-md-12">
		<div class="row my-2">
		<div class="col-md-4 mx-1 shadow">
			<img src="images/doc.jpg" style="width: 100%; height:190px;" alt="doc ka image">
			<h5 class="text-center"> We are employing doctors</h5>
			<a href="apply.php">
			<button class="btn btn-success" style=" margin-left: 30%">Apply now</button>
		</a>
		</div>
		<div class="col-md-4 mx-1 shadow">
			<img src="images/pat.jpg" style="width: 100%; height:190px; " alt="patient ka image">
			<h5 class="text-center"> Create Account</h5>
			<a href="account.php">
			<button class="btn btn-success" style=" margin-left: 30%">patient</button>
		</a>
		</div>
		<div class="col-md-3 mx-1 shadow">
			<img src="images/img3.jpg" style="width: 100%; height:190px"; alt="more info ka image">
 			<h5 class="text-center"> click here to read more</h5>
			<a href="#">
			<button class="btn btn-success" style=" margin-left: 30%">info</button>
		</div>
		

	</div>
	</div>
	

</div>
</body>

</html>