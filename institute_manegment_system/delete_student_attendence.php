<?php 
include("connection.php");


$sql = " DELETE FROM student_attendence WHERE id=".$_GET['id'];
$result = mysqli_query($connect,$sql);
if($result){
	echo "record detele successfully !";
	header('location:student_attendence_records.php');
}

?>