<?php
include("../include/connection.php");



$query="SELECT * FROM appointment WHERE status='Pending' ORDER BY date_booked ASC";
$res=mysqli_query($connect,$query);

$output="";

$output .="


<table class='table table-bordered'>
<tr>
<th>ID</th>
<th>Firstname</th>
<th>Surname</th>
<th>Gender</th>
<th>Phone</th>
<th colspan='2'>Doctor Name</th>
<th>Appointment Date</th>
<th>Appointment Time</th>
<th>Symptoms</th>

<th>Status</th>
<th>Date Booked</th>
<th>Action</th>
</tr>

";

if(mysqli_num_rows($res)<1)
{
$output .= "

<tr>
<td colspan='13'>No Appointments.</td>
</tr>

";
}


while($row=mysqli_fetch_array($res))
{
	$var=$row['doc_id'];
	$queri="SELECT doctors.firstname, doctors.surname FROM doctors INNER JOIN appointment ON doctors.id=appointment.doc_id AND doctors.id='$var'";
	$rese=mysqli_query($connect,$queri);
	$roow=mysqli_fetch_array($rese);

$output .= "



<tr>
<td>".$row['id']."</td>
<td>".$row['firstname']."</td>
<td>".$row['surname']."</td>
<td>".$row['gender']."</td>
<td>".$row['phone']."</td>
<td>".$roow['firstname']."</td>
<td>".$roow['surname']."</td>
<td>".$row['appointment_date']."</td>
<td>".$row['atime']."</td>
<td>".$row['symptoms']."</td>

<td>".$row['status']."</td>
<td>".$row['date_booked']."</td>



<td>
<div class='col-md-12'>
<div class='row'>
<div class='col-md-12'>
<button id='".$row['id']."' class='btn btn-success confirm' style='size:100px;'>Confirm</button>
</div>
<br><br>
</div>
<div class='row'>
<div class='col-md-12'>
<button id='".$row['id']."' class='btn btn-danger postpone' style='size:100px;width:100%'>Postpone</button>
</div>
</div>
</div>


</td>





";

}
$output .="
</tr>
</table>

";




echo $output;













?>