<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Appointment</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<?php
 	include("../include/header.php");
 	include("../include/connection.php");
 	?>
 	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left: -30px;">
					<?php 
					include("sidenav.php");  
					?>
				</div>
				<div class="col-md-10">
					
					<?php 
						$pat=$_SESSION['patient'];
						$sel=mysqli_query($connect, " SELECT * FROM patient WHERE username='$pat'");
						$row= mysqli_fetch_array($sel);

						$firstname = $row['firstname'];
						$surname= $row['surname'];
						$gender= $row['gender'];
						$phone = $row['phone'];

						if (isset($_POST['book'])) {
							if (empty($_POST['doc'])) {
								
							}else{


							$doc= $_POST['doc'];
	
							$date= $_POST['date'];
							$time=$_POST['time'];
							$sym=$_POST['sym'];

							if (empty($sym)) {
								# code...
							}else{
						$query= "INSERT INTO appointment(firstname, surname, gender, phone,doc_id,appointment_date,atime,symptoms,status,date_booked) VALUES('$firstname','$surname','$gender','$phone','$doc','$date','$time','$sym','Pending',NOW())";
						$res= mysqli_query($connect, $query);
						if ($res) {
						echo "<script>alert('YOU HAVE BOOKED an appointment')</script>";
						
					}
						}	}

						}


					?>
					<div class="col-md-12">
			<div class="row px-3">
				
				<div class="col-lg-10 col-xl-5 card flex-row mx-auto px-0">

					<div class="card-body">
						<h5 class="text-center my-3 title">Book Appointment</h5>
				<form method="post" class="form-box px-3">


					<div class="form-input">
					<label>Select Type</label>
					<select name="type" class="form-control" onChange="getState(this.value);">
					<option value="">Select Type</option>
					<option value="Pediatric">Pediatric</option>
					<option value="Gynac">Gynac</option>
					</select>
					</div>
					<br>
					<div class="form-input">
					<label>Select Doctor Name</label>
					<select id="print" name="doc" class="form-control">
					</select>
					</div>
					<br>

					<div class="form-input">
					<label>Appointment Date</label>
					<input type="date" name="date" class="form-control">
					</div>

					<div class="form-input">
					<label>Preferred Timeslot</label><br>
					<input type="text" class="form-control" name="time">
					</div>
					<div class="form-input">
					<label>Symptoms</label>	
					<input type="text" name="sym" class="form-control" autocomplete="off" placeholder="Enter Symptoms">
					</div>
					<button type="submit" name="book" class="btn btn-block" >BOOK APPOINTMENT</button>
				</form>
				</div>
				</div>
				
			</div>
		</div>



	</div>

	<script>
function getState(val){
$.ajax({
type:"POST",
url:"ajax_book_app.php",
data:'specialization='+val,
success:function(data){
$("#print").html(data);
}

});
}
</script>
</body>
</html>