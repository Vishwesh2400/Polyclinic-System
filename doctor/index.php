<?php
session_start();
?>
<html>
<head>
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
?>
</div>
<div class="col-md-10">
<div class="container-fluid">
<h5 class="text-center">Doctors Dashboard</h5>
<div class="col-md-12">
<div class="row">
<div class="col-md-3 my-2 mx-2 bg-info" style="height:150px;">
<div class="col-md-12">
<div class="row">
<div class="col-md-8">
<h5 class="text-white my-4">My Profile</h5>
</div>
<div class="col-md-4">
<a href="profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color:white;"></i></a>
</div>


</div>
</div>
</div>



<div class="col-md-3 my-2 mx-2 bg-success" style="height:150px;">
<div class="col-md-12">
<div class="row">
<div class="col-md-8">
	<?php 
					
					
					
	$v=$_SESSION['doctor'];

	$app= mysqli_query($connect, "SELECT * from appointment INNER JOIN (select * from doctors where username ='$v') as D ON appointment.doc_id = D.id  AND appointment.status='Confirmed'  ");
	$appoint= mysqli_num_rows($app);
	?>
<h5 class="text-white my-2" style="font-size:30px;"><?php echo $appoint; ?></h5>
<h5 class="text-white my-1">Total</h5>
<h5 class="text-white my-1">Appointment</h5>
</div>
<div class="col-md-4">
<a href="appointment.php"><i class="fa fa-calendar fa-3x my-4" style="color:white;"></i></a>
</div>


</div>
</div>
</div>

<div class="col-md-3 my-2 mx-2 bg-danger" style="height:150px;">
<div class="col-md-12">
<div class="row">
<div class="col-md-8">
	<?php 
	$p= mysqli_query($connect, "SELECT * FROM patient");
	$pp= mysqli_num_rows($p);
	?>
<h5 class="text-white my-2" style="font-size:30px;"><?php echo $appoint; ?></h5>
<h5 class="text-white my-1">Total</h5>
<h5 class="text-white my-1">Patient</h5>
</div>
<div class="col-md-4">
<a href="patient.php"><i class="fa fa-user-md fa-3x my-4" style="color:white;"></i></a>
</div>


</div>
</div>
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