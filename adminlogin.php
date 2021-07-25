<?php
session_start();
include("include/connection.php");
if(isset($_POST['login'])) {
   $username=$_POST['uname'];
   $password=$_POST['pass'];

   $error=array();
   if(empty($username)){
   	$error['admin']="Enter username";
     }else if(empty($password)){
     	$error['admin']="Enter Password";
     	
     }
     if(count($error)==0){
     	$query="SELECT * FROM admin WHERE username='$username' AND password='$password'";
     	$result = mysqli_query($connect,$query);

     	if(mysqli_num_rows($result)==1){
     	  echo "<script>alert('You have logged in as an admin')</script>";
     	  $_SESSION['admin']= $username;

     	  header("Location:admin/index.php");
     	  exit();
     	     	
     	}else{
     	echo "<script>alert('invalid details entered')</script>";
     	}

     }
   }
   ?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Login page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
	include("include/header.php");
	?>

	<div style="margin-top: 60px;"></div>
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				
				<div class="col-lg-10 col-xl-5 card flex-row mx-auto px-0">
						<div class="card-body">
					<img height='150px'src="images/admin.jpg" class="col-md-12">
					<form method="post" class="form-box px-3">
					        <div >
 							  <?php
 							  	if(isset($error['admin'])){
 							  		$sh = $error['admin'];
 							  		 $show="<h4 class='alert alert-danger'>$sh</h4>";
 							  	} else {
 							  		$show="";
 							  	}
 							  		echo $show; 	
 							  ?>
					        </div>  
						<div class="form-input">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
						</div>
						<div class="form-input">
							<label>Password</label>
							<input type="password" name="pass" placeholder="Enter Password"class="form-control">
						</div>
						<button type="submit" name="login" class="btn btn-block" >LOGIN</button>

					</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>