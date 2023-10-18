<?php
$conn = mysqli_connect("localhost","root","pass","institute_manegment_system") or die("connction failed");
if(isset($_POST['date1']) && isset($_POST['date2'])){
$min = $_POST['date1'];
$max = $_POST['date2'];
$sql = "SELECT * FROM student WHERE birthdate BETWEEN '{$min}' AND '{$max}'";
}else{
	$sql = "SELECT * FROM student ORDER BY id asc";
}
$result = mysqli_query($conn,$sql) or die("Query unsuccessful.");
$output = "";

if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_assoc($result)){
	$dob = date('d M,y',strtotime($row['birthdate']));
	$output .= "<tr>
				<td align='center'>{$row['id']}</td>
				<td>{$row['fullname']}</td>
				<td>{$row['image']}</td>
				<td>{$row['email']}</td>
				<td>{$row['phone']}</td>
				<td>{$dob}</td>
				<td>{$row['gender']}</td>
				<td>{$row['course']}</td>
				<td>{$row['address']}</td>

	            </tr>";
}
echo $output;
}else{
	echo "<h2>no record found.</h2>";
}

?>