<?php
include("../include/connection.php");


$id=$_POST['id'];

$query="UPDATE appointment SET status='Confirmed' WHERE id='$id'";

mysqli_query($connect,$query);

?>