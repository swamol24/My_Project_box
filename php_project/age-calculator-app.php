<?php
// Get the birth date from input
$birthDate = $_POST['birthdate'];

// Calculate the age
$today = new DateTime();
$diff = $today->diff(new DateTime($birthDate));
$age = $diff->y;

// Display the age
echo "Your age is: " . $age;
?>