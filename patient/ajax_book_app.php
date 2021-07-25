<?php
include("../include/connection.php");


$spec=$_POST['specialization'];
$query="SELECT id,firstname,surname FROM doctors WHERE specialization='$spec'";
$res=mysqli_query($connect,$query);



echo "<option value=''>Select Doctor Name</option>";

while($row=mysqli_fetch_array($res))
{


echo "<option value='".$row['id']."'>".$row['firstname']. " " .$row['surname']. "</option>";



}




?>