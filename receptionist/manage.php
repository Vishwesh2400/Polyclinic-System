<?php 

session_start();

?>



<html>
<head>
<title>Manage Appointments</title>

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
?>





</div>
<div class="col-md-10 my">
<h5 class="text-center">Appointments</h5>


<div id="show"></div>



</div>







</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
show();
function show(){

$.ajax({
url:"ajax_appointment.php",
method:"POST",
success:function(data){
$("#show").html(data);




}







});





}

$(document).on('click','.confirm',function(){

var id=$(this).attr("id");


$.ajax({


url:"ajax_confirm.php",
method:"POST",
data:{id:id},
success:function(data){
show();




}








});


});


$(document).on('click','.postpone',function(){

var id=$(this).attr("id");


$.ajax({


url:"ajax_postpone.php",
method:"POST",
data:{id:id},
success:function(data){
show();




}








});

});

});








</script>
</body>
</html>