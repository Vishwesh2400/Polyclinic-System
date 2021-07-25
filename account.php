<?php
include("include/connection.php");
if(isset($_POST['create'])){
$fname=$_POST['fname'];
$sname=$_POST['sname'];
$uname=$_POST['uname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$password=$_POST['pass'];
$con_pass=$_POST['con_pass'];
$error=array();
if(empty($fname)){
$error['ac']="Enter Firstname";
}
else if(empty($sname)){
$error['ac']="Enter Surname";
}
else if(empty($uname)){
$error['ac']="Enter Username";
}
else if(empty($email)){
$error['ac']="Enter Email";
}
else if(empty($phone)){
$error['ac']="Enter Phone Number";
}
else if($gender==""){
$error['ac']="Select your gender";
}

else if(empty($password)){
$error['ac']="Enter Password";
}
else if($con_pass!=$password){
$error['ac']="Passwords do not match";
}

if(count($error)==0){
$query="INSERT INTO patient(firstname,surname,username,email,phone,gender,password,date_reg,profile) VALUES ('$fname','$sname','$uname','$email','$phone','$gender','$password',NOW(),'patient.jpg')";
$res=mysqli_query($connect,$query);
if($res){
header("Location:patientlogin.php");
}
else{
echo "<script>alert('failed')</script>";
}
}
}
?>


<html>
<head>
<title>Create Account</title>
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
<h5 class="text-center title" >Create Account</h5>
<form method="post" class="form-box px-3">
<div class="form-input">
<label>Firstname</label>
<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
</div>

<div class="form-input">
<label>Surname</label>
<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname">
</div>

<div class="form-input">
<label>Username</label>
<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
</div>

<div class="form-input">
<label>Email</label>
<input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Email">
</div>

<div class="form-input">
<label>Phone</label>
<input type="number" name="phone" class="form-control" autocomplete="off" placeholder="Enter Phone Number">
</div>

<div class="form-input">
<label>Gender</label>
<select name="gender" class="form-control">
<option value="">Select your gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div><br>



<div class="form-input">
<label>Password</label>
<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
</div>

<div class="form-input">
<label>Confirm Password</label>
<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
</div>

<button type="submit" name="create" class="btn btn-block" >CREATE ACCOUNT</button>
<p>I already have an account<a href="patientlogin.php">Click here.</a></p>







</form>
</div>
</div>







</div>
</div>
</div>
</body>
</html>