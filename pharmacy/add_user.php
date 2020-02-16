<?php
require "mysql_connection.php";
	
$name = $_REQUEST['name'];
$user_id = $_REQUEST['user_id'];
$age = $_REQUEST['age'];
$gender = $_REQUEST['gender'];
$dob = $_REQUEST['dob'];
$email = urldecode($_REQUEST['email']);
$password = $_REQUEST['password'];

$query = "INSERT INTO user (name, user_id, age, gender, dob, email, password) 
		VALUES('$name', '$user_id', $age, '$gender', '$dob', '$email', '$password');";
	
if ($con->query($query) === TRUE) {
    echo "success";
} else {
	echo "Error: " . $query . "<br>" . $con->error;
}
mysqli_close($con);

?>