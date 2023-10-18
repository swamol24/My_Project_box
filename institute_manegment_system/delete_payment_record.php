<?php 
include("connection.php");


$sql = " DELETE FROM fee_history WHERE id=".$_GET['id'];
$result = mysqli_query($connect,$sql);
if($result){
	echo "record detele successfully !";
	header('location:fee_history_record.php');
}

?>