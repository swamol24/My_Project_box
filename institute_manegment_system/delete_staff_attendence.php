<?php 
include("connection.php");


$sql = " DELETE FROM staff_attendence WHERE id=".$_GET['id'];
$result = mysqli_query($connect,$sql);
if($result){
	echo "record detele successfully !";
	header('location:staff_attendence_record.php');
}

?>