<?php
inclued_once('connection.php');
$sql="SELECT * FROM student";
$result=mysqli_query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>pagination</title>
</head>
<body>
	<table align="center" border="1px">
		<tr>
			<th>ID</th>
			<th>fullname</th>
			<th>Photo</th>
			<th>Email ID</th>
			<th>Phone No</th>
			<th>Birthdate</th>
			<th>Gender</th>
			<th>Course</th>
			<th>Address</th>
		</tr>
		<?php
		while($row=mysqli_fetch_assoc($result)){
			?>
			<tr>
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['fullname'];?></td>
				<td><?php echo $row['image'];?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['phone'];?></td>
				<td><?php echo $row['birthdate'];?></td>
				<td><?php echo $row['gender'];?></td>
				<td><?php echo $row['course'];?></td>
				<td><?php echo $row['address'];?></td>

			</tr>
			<?php
		}
		?>
	</table>

</body>
</html>