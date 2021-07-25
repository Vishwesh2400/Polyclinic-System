<?php
include("../include/connection.php");


$id=$_POST['id'];

$query="UPDATE appointment SET status='Postponed' WHERE id='$id'";

mysqli_query($connect,$query);

?>