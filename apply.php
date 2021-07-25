<?php 
include("include/connection.php");
if (isset($_POST['apply'])) {
	$firstname= $_POST['fname'];
	$surname= $_POST['sname'];
	$username= $_POST['uname'];
	$email= $_POST['email'];
	$spec= $_POST['spec'];
	$gender= $_POST['gender'];
	$phone= $_POST['phone'];
	$experience= $_POST['exp'];
	$password= $_POST['pass'];
	$confirm_password= $_POST['con_pass'];

	$error=array();
	if (empty($firstname)) {
		$error['apply']= "Enter Firstname";
	}else if (empty($surname)) {
		$error['apply']= "Enter Surname";
	}else if (empty($username)) {
		$error['apply']= "Enter Username";
	}else if (empty($email)) {
		$error['apply']= "Enter Email ID";
	}else if (empty($spec)) {
		$error['apply']= "Enter Your specialization";
	}else if (empty($username)) {
		$error['apply']= "Enter Username";
	}else if ($gender == "") {
		$error['apply']= "Select your Gender";
	}else if (empty($phone)) {
		$error['apply']= "Enter Phone Number";
	}else if (empty($experience)) {
		$error['apply']= "Enter your Years of Experience";
	}else if (empty($password)) {
		$error['apply']= "Enter Password";
	}else if ($confirm_password != $password) {
		$error['apply']= "invalid password entered";
	}

	if (count($error)== 0){
		$query="INSERT INTO doctors(firstname,surname,username,email,specialization,gender,phone,experience,password,salary,date_reg,status,profile) VALUES('$firstname','$surname','$username','$email','$spec','$gender','$phone','$experience','$password','0',NOW(),'pending','doctor.jpg')";
		$result= mysqli_query($connect, $query);
		if ($result) {
			echo "<script>alert('YOU HAVE SUCCESSFULLY APPLIED')</script>";
			header("Location: doctorlogin.php");
		}else{
			echo "<script>alert('FAILED')</script>";

		}
	}

}
if (isset($error['apply'])) {
	$s= $error['apply'];
	$show="<h5 class='text-center alert alert-danger'>$s</h5>";

}else{
	$show="";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Apply Now!!!</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<?php 
	include("include/header.php");
	?>
	<div class="container">
		<div class="col-md-12">
			<div class="row px-3">
				
				<div class="col-lg-10 col-xl-5 card flex-row mx-auto px-0">
					<div class="card-body">
					<h5 class="text-center title">Apply Now!!!</h5>
					<div>
						<?php 
							echo $show;
						?>
					</div>
					<form method="post" class="form-box px-3">
						<div class="form-input">
							<label>Firstname</label>
							<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname'])) echo $_POST['fname'];  ?>">
						</div>
						<div class="form-input">
							<label>Surname</label>
							<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Firstname" value="<?php if(isset($_POST['sname'])) echo $_POST['sname'];  ?>">
						</div>
						<div class="form-input">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])) echo $_POST['uname'];  ?>">
						</div>
						<div class="form-input">
							<label>Email</label>
							<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Enter Email ID" value="<?php if(isset($_POST['email'])) echo $_POST['email'];  ?>">
						</div>
						<div class="form-input">
							<label>Specialization</label>
							<input type="text" name="spec" class="form-control" autocomplete="off" placeholder="Enter Your Specialization" value="<?php if(isset($_POST['spec'])) echo $_POST['spec'];  ?>">
						</div>
						<div class="form-input">
							<label>Select Gender</label>
							<select name="gender" class="form-control">
								<option value="">Select Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="other">Other</option>
							</select><br>
						</div>
						<div class="form-input">
							<label>Phone</label>
							<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone number" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];  ?>">
						</div>
						<div class="form-input">
							<label>Experience</label>
							<input type="number" name="exp" class="form-control" autocomplete="off" placeholder="Enter your years of experience" value="<?php if(isset($_POST['exp'])) echo $_POST['exp'];  ?>">
						</div>
						<div class="form-input">
							<label>Password</label>
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
						</div>
						<div class="form-input">
							<label>Confirm Password</label>
							<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
						</div>
						<button type="submit" name="apply" class="btn btn-block" >APPLY NOW</button>
						<p>I already have an account <a href="doctorlogin.php">Click Here</a></p>

					</form>
				</div>
				</div>
			
			</div>
		</div>
	</div>
</body>
</html>