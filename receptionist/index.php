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
<div class="col-md-10">
<h5 class="my-3">Receptionist Dashboard</h5>
<div class="col-md-12">
<div class="row">

<div class="col-md-3 bg-warning mx-2" style="height:150px";>
<div class="col-md-12">
<div class="row">
<div class="col-md-8">
<h5 class="text-white my-4">View Patients</h5>
</div>
<div class="col-md-4">
<a href="#">
<i class="fa fa-calendar fa-3x my-4" style="color:white;"></i>
</a>
</div>
</div>
</div>
</div>


<div class="col-md-3 bg-warning mx-2" style="height:150px";>
<div class="col-md-12">
<div class="row">
<div class="col-md-8">
<h5 class="text-white my-4">Manage Appointment</h5>
</div>
<div class="col-md-4">
<a href="manage.php">
<i class="fa fa-calendar fa-3x my-4" style="color:white;"></i>
</a>
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
