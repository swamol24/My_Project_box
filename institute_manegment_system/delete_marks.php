<?php 
include("connection.php");


$sql = " DELETE FROM score_card WHERE id=".$_GET['id'];
$result = mysqli_query($connect,$sql);
if($result){
	echo "record detele successfully !";
	header('location:score_record.php');
}

?>