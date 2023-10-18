<?php 
include("connection.php");


$sql = " DELETE FROM staff WHERE id=".$_GET['id'];
$result = mysqli_query($connect,$sql);
if($result){
	echo "record detele successfully !";
	header('location:staff_record.php');
}

?>