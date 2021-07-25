<?php
session_start();
include("include/connection.php");
if (isset($_POST['login'])) {
 	$username=$_POST['uname'];
 	$password=$_POST['pass'];
 	
 	$q="SELECT * FROM doctors WHERE username='$username' AND password='$password' ";
 	$qq= mysqli_query($connect,$q);
 	$row=mysqli_fetch_array($qq);
 	$error=array();
 	if (empty($username)) {
 		$error['login']="Enter Username";
 	}else if (empty($password)) {
 		$error['login']="Enter Password";
 	}else if($row['status']=="pending"){
 		$error['login']="Please wait for admin's confirmation";
 	}else if ($row['status']=="Rejected") {
 		$error['login']= "Try again Later";
 	}

 	if (count($error)==0) {
 		$query="SELECT * FROM doctors WHERE username='$username' AND password='$password'";
 		$res=mysqli_query($connect,$query);
 		if (mysqli_num_rows($res)) {
 			echo "<script>alert('done')</script>";
 			$_SESSION['doctor']=$username;
 			header("Location:doctor/index.php");
 		}else{
 			echo "<script>alert('Invalid Account')</script>";
 		}
 	}}
 	if (isset($error['login'])) {
 		$l= $error['login'];
 		$show="<h5 class='text-center alert alert-danger'>$l</h5>";
 	}else{
 		$show="";
 	}
  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Doctor Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
	include("include/header.php");
	?>
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				
					
				
				<div class="col-lg-10 col-xl-5 card flex-row mx-auto px-0">
						<div class="card-body">
					<h5 class="text-center my-2 title">DOCTORS LOGIN</h5>
						<div>
							<?php echo $show; ?>
						</div>
					<form method="post" class="form-box px-3">
						<div class="form-input">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
						</div>
						<div class="form-input">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" placeholder="Enter Password"autocomplete="off">
						</div>
						<button type="submit" name="login" class="btn btn-block" >LOGIN</button>
						<p>I don't have an account <a href="apply.php">Apply Now!!!</a></p>
					</form>
				</div>
				</div>
			</div>
		</div>
		
	</div>
</body>
</html>