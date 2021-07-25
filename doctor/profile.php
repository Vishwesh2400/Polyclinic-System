<?php
session_start();
?>
<html>
<head>
<title>Doctor Profile Page</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<style type="text/css">
	#tab th {
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
?>

<div class="container-fluid">
<div class="col-md-12">
<div class="row">
<div class="col-md-2" style="margin-left:-30px;">
<?php
include("sidenav.php");
include("../include/connection.php");
?>
</div>
<div class="col-md-10">
<div class="container-fluid">
<div class="col-md-12">

<div class="row">
<div class="col-md-6">
<?php
$doc = $_SESSION['doctor'];
$query="SELECT * FROM doctors WHERE username='$doc'";
$res=mysqli_query($connect,$query);
$row=mysqli_fetch_array($res);

if(isset($_POST['upload'])){
$img=$_FILES['img']['name'];
if(empty($img)){
}
else{
$query="UPDATE doctors SET profile='$img' WHERE username='$doc'";
$res=mysqli_query($connect,$query);
if($res){
move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");

}
}
}


?>
<form method="post" enctype="multipart/form-data" class="form-box px-3">
<?php
echo "<img src='img/".$row['profile']."' style='height:250px;' class='col-md-12 my-3'>";


?>
<div class="form-input">
<input type="file" name="img" class="form-control my-1">
</div>
<button type="submit" name="upload" class="btn btn-block" >UPDATE PROFILE</button>
</form>


<div class="my-3">
<table id='tab' class="table table-bordered">
<tr>
<th colspan = "2" class="text-center">Details</th>
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
<td>Phone</td>
<td><?php echo $row['phone'];?></td>
</tr>

<tr>
<td>Gender</td>
<td><?php echo $row['gender'];?></td>
</tr>

<tr>
<td>Specialization</td>
<td><?php echo $row['specialization'];?></td>
</tr>
<tr>
<td>Years Of Experience</td>
<td><?php echo $row['experience'];?></td>
</tr>

<tr>
<td>Salary</td>
<td><?php echo $row['salary'];?></td>
</tr>








</table>
</div>
</div>

<div class="col-md-6">
<h5 class="text-center my-2">Change Username</h5>
<?php 
if (isset($_POST['change_uname'])){
$uname=$_POST['uname'];
if(empty($uname)){
}
else
{
$query="UPDATE doctors SET username='$uname' WHERE username='$doc'";
$res=mysqli_query($connect,$query);
if($res){
$_SESSION['doctor']=$uname;
}



}


}
?>
<form method="post" enctype="multipart/form-data" class="form-box px-3">
<div class="form-input">
<label>Change Username</label>
<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
</div>

<button type="submit" name="change_uname" class="btn btn-block" >CHANGE USERNAME</button>
</form>
<br><br>

<h5 class="text-center my-2">Change Password</h5>
<?php
if(isset($_POST['change_pass'])){
$old=$_POST['old_pass'];
$new=$_POST['new_pass'];
$con=$_POST['con_pass'];
$ol="SELECT * FROM doctors WHERE username='$doc'";
$ols=mysqli_query($connect,$ol);
$row=mysqli_fetch_array($ols);

if($old!=$row['password']){

}
else if(empty($new)){


}else if($con !=$new){

}else{
$query="UPDATE doctors SET password='$new' WHERE username='$doc'";
mysqli_query($connect,$query);

}


}
?>
<form method="post" enctype="multipart/form-data" class="form-box px-3">
<div class="form-input">
<label>Old password</label>
<input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter old password">
</div>

<div class="form-input">
<label>New password</label>
<input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter new password">
</div>

<div class="form-input">
<label>Confirm password</label>
<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm password">
</div>

<button type="submit" name="change_pass" class="btn btn-block" >CHANGE PASSWORD</button>

</form>
<br><br>




</div>



</div>
</div>
</div>
</div>

</div>
</div>
</div>




</body>
</html>