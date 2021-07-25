<?php
session_start();
?>
<html>
<head>
<title>Patient Profile</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<style type="text/css">
	#pat th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #3f3f3f;
  color: white;
}
	</style>
</head>
<body>
<?php
include("../include/header.php");
include("../include/connection.php");
?>

<div class="container-fluid">
<div class="col-md-12">
<div class="row">
<div class="col-md-2" style="margin-left:-30px;">
<?php
include("sidenav.php");

$patient=$_SESSION['patient'];
$query="SELECT * FROM patient WHERE username='$patient'";
$res=mysqli_query($connect,$query);
$row=mysqli_fetch_array($res);


?>
</div>

<div class="col-md-10">
<div class="col-md-12">
<div class="row">
<div class="col-md-6">

<?php
if(isset($_POST['upload'])){
$img=$_FILES['img']['name'];
if(empty($img)){
}
else
{
$query="UPDATE patient SET profile='$img' WHERE username='$patient'";
$res=mysqli_query($connect,$query);
if($res){
move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
}

}
}
?>

<form method="post" class="form-box px-3" enctype="multipart/form-data">
<?php
echo "<img src='img/".$row['profile']."' class='col-md-12' style='height:250px;'>";
?>
<br><br>
<div class="form-input">
<input type="file" name="img" class="form-control my-2">
<h5 class="text-center my-4">Update Profile</h5>
</div>
<button type="submit" name="upload" class="btn btn-block" >UPLOAD</button>
</form>
<table id='pat' class="table table-bordered">
<tr>
<th colspan="2" class="text-center">My Details</th>
</tr>
<tr>
<td>Firstname</td>
<td><?php echo $row['firstname'];?></td>
</tr>

<tr>
<td>Surname</td>
<td><?php echo $row['surname'];?></td>
</tr>


<tr>
<td>Username</td>
<td><?php echo $row['username'];?></td>
</tr>

<tr>
<td>Email</td>
<td><?php echo $row['email'];?></td>
</tr>

<tr>
<td>Phone Number</td>
<td><?php echo $row['phone'];?></td>
</tr>

<tr>
<td>Gender</td>
<td><?php echo $row['gender'];?></td>
</tr>

</table>
</div>
<div class="col-md-6">

<?php

if(isset($_POST['update'])){
$uname=$_POST['uname'];

if(empty($uname)){

}
else{
$query="UPDATE patient SET username='$uname' WHERE username='$patient'";
$res=mysqli_query($connect,$query);
if($res){
$_SESSION['patient']=$uname;

}




}
}
?>

<form method="post" class="form-box px-3">
<h5 class="text-center my-4">Change Username</h5>
<div class="form-input">
<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
</div>
<button type="submit" name="update" class="btn btn-block" >UPDATE USERNAME</button>


</form>
<?php
if(isset($_POST['change'])){
$old=$_POST['old_pass'];
$new=$_POST['new_pass'];
$con=$_POST['con_pass'];

$q="SELECT * FROM patient WHERE username='$patient'";
$re=mysqli_query($connect,$q);
$row=mysqli_fetch_array($re);
if(empty($old)){
echo "<script>alert('Enter the old password')</script>";
}
else if(empty($new)){
echo "<script>alert('Enter New Password')</script>";
}
else if($con!=$new){
echo "<script>alert('Passwords do not match')</script>";
}
else if($old!=$row['password']){
echo "<script>alert('Check the old password')</script>";
}
else{
$query="UPDATE patient SET password='$new' WHERE username='$patient'";
mysqli_query($connect,$query);
}
}
?>

<form method="post" class="form-box px-3">
<h5 class="my-4 text-center">Change Password</h5>
<div class="form-input">
<label>Old Password</label>
<input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
</div>
<div class="form-input">
<label>New Password</label>
<input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter New Password">
</div>
<div class="form-input">
<label>Confirm Password</label>
<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Username">
</div>
<button type="submit" name="change" class="btn btn-block" >UPDATE PASSWORD</button>

</form>
</div>


</div>
</div>
</div>

</div>
</div>
</div>


</body>
</html>