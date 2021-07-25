 <?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Total Patient</title>
	<style type="text/css">
	#pat th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
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
					<h5 class="text-center my-3">Total Patient</h5>
					<?php

						$v=$_SESSION['doctor'];
						$query="SELECT appointment.firstname,appointment.surname from appointment INNER JOIN (select * from doctors where username ='$v') as D ON appointment.doc_id = D.id AND appointment.status='Confirmed'";

						$res= mysqli_query($connect,$query);
						$output="";
						$output .="
						<table id='pat' class='table table-bordered'>
							<tr>
					 			<th>ID</td>
								<th>Firstname</th>
								 <th>Surname</th>
								 <th>Username</th>
								 <th>Email</th>
								 <th>Phone</th>
								 <th>Gender</th>
								 <th>Date Reg.</th>
								 <th>Action</th>
					
								</tr>
						";
						if(mysqli_num_rows($res)<1)
							{
							$output .= "

							<tr>
							<td class='text-center' colspan='10'>No Patient Yet</td>
							</tr>

							";
							}
						while($row=mysqli_fetch_array($res))
							{
								$fname=$row['firstname'];
								$sname=$row['surname'];

								$queri = "SELECT * FROM patient where firstname='$fname' AND surname='$sname'";
								
								$rees= mysqli_query($connect,$queri);
								$roow=mysqli_fetch_array($rees);
								
								




						$output .= "



						<tr>
						<td>".$roow['id']."</td>
						<td>".$roow['firstname']."</td>
						<td>".$roow['surname']."</td>
						<td>".$roow['username']."</td>
						<td>".$roow['email']."</td>

						<td>".$roow['phone']."</td>
						<td>".$roow['gender']."</td>
						

						<td>".$roow['date_reg']."</td>
						<td>
						<a href='view.php?id=".$roow['id']."'>
						<button class='btn btn-info' style='size:100px;'>View</button>


						</a>
						</td>





						";

						}		
						$output .="
						</tr>
						</table>

						";




						echo $output;

					 ?>

				</div>
			</div>
		</div>
		
	</div>
</body>
</html>