<?php
$conn = mysqli_connect("localhost","root","pass","institute_manegment_system") or die("connection Failed");
$sql = "SELECT * FROM fee_history WHERE payment = '{$_POST['payment']}'";
$result = mysqli_query($conn,$sql) or die("SQL query failed");
$output = "";
if(mysqli_num_rows($result) > 0){
	$output .= '<table border="0" width="100%" cellpadding="10px">
		<tr>
		<th width="60px">ID</th>
		<th>Fullname</th>
		<th width="90px">Course</th>
		<th width="90px">Payment</th>
		</tr>';
while($row = mysqli_fetch_assoc($result)){
	$output .="<tr>
				<td align='center'>{$row["id"]}</td>
				<td>{$row["fullname"]}</td>
				<td>{$row["course"]}</td>
				<td>{$row["payment"]}</td>
				</tr>";
}
$output .="<table>";
echo $output;
}else{
	echo "No record found.";
}
?>