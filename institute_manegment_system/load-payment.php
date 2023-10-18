<?php
$conn = mysqli_connect("localhost","root","pass","institute_manegment_system") or die("connection Failed");
//this query take common name avoid repation
$sql = "SELECT distinct(payment) FROM fee_history";
$result = mysqli_query($conn,$sql) or die("SQL query failed");
//check single record
if(mysqli_num_rows($result) > 0){
	$output = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo json_encode($output);	
}else{
	echo "no record found. ";
}
?>