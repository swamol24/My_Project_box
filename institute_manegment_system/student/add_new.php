<?php
include("connection.php");
error_reporting(0);
?>

<?php
//define variables and set to empty
$fullname=$email=$phone=$birthdate=$gender=$course=$address='';
$fullnameerror=$emailerror=$phoneerror=$birthdateerror=$gendererror=$courseerror=$addresserror='';

//set validation

function validation($value){
	$value = htmlspecialchars($value);
	$value = trim($value);
	$value = stripcslashes($value);
	return($value);
}
?>

<?php
if(isset($_POST['submit'])){
	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$birthdate = $_POST['birthdate'];
	$gender = $_POST['gender'];
	$course = $_POST['course'];
	$address = $_POST['address'];

//validate each input field

if(empty($fullname)){
	$fullnameerror = "fullname is required !<br>";
}
else{
$fullname = validation($fullname);
}
// if(empty($image)){
//         $imageerror="profile_image is requried";
//     }
//     else{
//         $image=validation($image);
//         echo "<br>";
//     }

if(empty($email)){
	$emailerror = "email is required !<br>";
}
elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
echo "Invalid email format !<br>";	
}
else{
$email = validation($email);
}

if(empty($phone)){
	$phoneerror = "phone numbers is required !<br>";
}elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
	echo "Please enter valid phone number.<br>";
}
else{
$phone = validation($phone);
}

if(empty($birthdate)){
	$birthdateerror = "birthdate is required !<br>";
}
else{
$birthdate = validation($birthdate);
}

if(empty($gender)){
	$gendererror = "gender is required !<br>";
}
else{
$gender = validation($gender);
}

if(empty($course)){	
$courseerror = "<p>you didn't select any course !</p>\n" ;
}else{
// $selectCourse = count($course);
// for($i = 0;$i < $selectCourse ; $i++){
// 	echo($course[$i]. " ");
}


if(empty($address)){
	$addresserror = "address is required !<br>";
}
else{
$address = validation($address);
}

//image file upload

// $target_dir ="img/";
// $target_file = $target_dir . basename($_FILES["image"]["name"]);
//  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
//     $image = $_FILES["image"]["name"]; 
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }

$filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];
$image = "img/".$filename;
//echo $folder;
move_uploaded_file($tempname, $image);


 //data inserted through query

 $query = "INSERT INTO student(fullname,image,email,phone,birthdate,gender,course,address) VALUES ('$fullname','$image','$email','$phone','$birthdate','$gender','$course','$address')";
 $result = mysqli_query($connect,$query);
 if($result){
 	echo "student record added successfully !!<br>";
 }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add new student</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">

	<style type="text/css">
		#form{
			background: lightgray;
			width: 100%;
		}
		 form h2{
			background : darkgray;
			border-radius: 10px;
			width: 300px;
		}
		form label{
				font-size: 15px;
				font-weight: bold;
			}
			form input{
			font-size: 15px;
			font-family: 'Flamenco', cursive;
			 border-radius: 5px;
			 padding: 6px;
			}
			form div{
				margin: 15px;
			}
			form .error{
				color:#FF0000;
			}
	</style>
</head>
<body>
	<?php include("admin_dashboard.php"); ?>

	<center><form id="form" action="" method="POST" enctype="multipart/form-data">
		<h2>Students Entry Form</h2>
	<div><label for="fullname">Write Fullname :</label>
		<input type="text" name="fullname" placeholder="Write Fullname.." />
		<span class="error">* <?php echo $fullnameerror;?></span></div>

	<div><label for="image">Upload image :</label>
		<input type="file" name="image" id="fileToUpload" /></div>
	<div>
		<div><label for="email">Enter Email Id :</label>
			<input type="email" name="email" placeholder="Enter Email Address.." />
			<span class="error">*<?php echo $emailerror; ?></span>
		</div>
			<div><label for="phone">Enter Valid Phone Number : </label>
		<input type="phone" name="phone" placeholder="Enter Phone No.." />
	<span class="error">*<?php echo $phoneerror; ?></span>
	</div>
		<div>
		<label>Select Date Of Birth :</label>
	<input type="date" name="birthdate"/>
	<span class="error">*<?php echo $birthdateerror; ?></span>
	</div>
	<div><label for="gender">Select Gender :</label>
	Male
	<input type="radio" name="gender" value="Male" />
	Female
	<input type="radio" name="gender" value="Female" /></div>
	<span class="error">*<?php echo $gendererror; ?></span>
	</div>
	<div><label for="courses">Select course : </label>
		<select name="course" id="course" >
		<optgroup label="Front End :">
			<option value="HTML 5"> HTML 5</option>
			<option value="CSS 3"> CSS 3</option>
			<option value="Bootstrap 5"> Bootstrap 5</option>
			<option value="Javascript">Javascript</option>
			<option value="Jquery">Jquery</option>
			<option value="Anguler"> Anguler</option>
			<option value="React"> React</option>
		</optgroup>
		<optgroup label="Back End :">
			<option value="PHP"> PHP</option>
			<option value="Python"> Python</option>
			<option value="Mysql"> Mysql</option>
			<option value="Laravel">Laravel</option>
			<option value=" WordPress"> WordPress</option>
		</optgroup>
	</select>
	<span class="error">*<?php echo $courseerror; ?></span>
	</div>
	<label for="address">Type Residential Address :</label>
	<div><textarea name="address"cols="30" rows="10" placeholder="Enter Your Address"></textarea>
	<span class="error">*<?php echo $addresserror; ?></span>
	</div>
	<div><input type="submit" name="submit" value="Add To Record" />
		<a href="student_records.php">Check Student Record Table</a></div>
	</form></center>

</body>
</html>