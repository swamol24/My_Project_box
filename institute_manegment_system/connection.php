<?php
$connect = mysqli_connect("localhost","root","pass","institute_manegment_system");
//check connection
if(mysqli_connect_errno()){
echo "Failed to connect MySQL : ";
mysqli_connect_error();
}
?>