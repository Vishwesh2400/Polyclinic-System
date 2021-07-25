<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Total Appointment</title>
	
	<style type="text/css">
	#app th {
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
				<div class="col-md-2" style="margin-left: -30px;">
					<?php 
					include("sidenav.php");  
					?>
				</div>
				<div class="col-md-10">
					<h5 class="text-center my-3">View Appointment</h5>
					<?php 
					$v=$_SESSION['doctor'];
						$query="SELECT appointment.id, appointment.firstname, appointment.surname,
						appointment.gender,appointment.phone, appointment.appointment_date, appointment.symptoms,appointment.date_booked from appointment INNER JOIN (select * from doctors where username ='$v') as D ON appointment.doc_id = D.id AND appointment.status='Confirmed'";

						$res= mysqli_query($connect,$query);
					//$query= "SELECT * FROM appointment WHERE status='Confirmed'";
					//$res= mysqli_query($connect,$query);
					$output = "";
					$output .="
					<table id='app' class='table table-bordered'
							<tr>
					 			 <th>ID</th>
								 <th>Firstname</th>
								 <th>Surname</th>
								 <th>Gender</th>
								 <th>Phone</th>
								 <th>Appointment Date</th>
								 <th>Symptoms</th>
								 <th>Date Booked</th>
								 <th>Action</th>

								</tr>
						";
						if(mysqli_num_rows($res)<1)
					{
					$output .= "

					<tr>
					<td class='text-center' colspan='9'>No Appointment Yet</td>
					</tr>

					";
					}


					while($row=mysqli_fetch_array($res))
					{
						
					$output .= "



					<tr>
					<td>".$row['id']."</td>
					<td>".$row['firstname']."</td>
					<td>".$row['surname']."</td>
					<td>".$row['gender']."</td>
					<td>".$row['phone']."</td>
					<td>".$row['appointment_date']."</td>
					<td>".$row['symptoms']."</td>
					<td>".$row['date_booked']."</td>

					<td>
					<a href='discharge.php?id=".$row['id']."'>
					<button class='btn btn-info' style='size:100px;'>Check</button>


					</a>
					</td>

					";
				}
				$output.= "</tr></table>";
				echo $output;
				?>
</body>
</html>