<?php
session_start();
include("include/connection.php");
if(isset($_POST['login'])){
$uname=$_POST['uname'];
$pass=$_POST['pass'];
if(empty($uname)){
echo "<script>alert('Enter Username')</script>";
}
else if(empty($pass)){
echo "<script>alert('Enter Password')</script>";
}
else{
$query="SELECT * FROM receptionist WHERE username='$uname' AND password='$pass'";
$res=mysqli_query($connect,$query);
if(mysqli_num_rows($res)==1){
header("Location:receptionist/manage.php");
$_SESSION['receptionist']=$uname;
}
else{
echo "<script>alert('Invalid Username or Password')</script>";
}

}

}

?>
<html>
<head>
<title>Receptionist Login</title>
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
<h5 class="text-center my-3 title">Receptionist Login</h5>
<form method="post" class="form-box px-3">

<div class="form-input">
<label>Username</label>
<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter the Username">
</div>

<div class="form-input">
<label>Password</label>
<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter the Password">
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