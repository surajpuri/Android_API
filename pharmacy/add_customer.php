<?php
require "mysql_connection.php";
	
$name = $_REQUEST['name'];
$email = urldecode($_REQUEST['email']);
$number = $_REQUEST['number'];
$address = $_REQUEST['address'];


$query = "INSERT INTO customer (name, number, address, email) 
		VALUES('$name', '$number', '$address', '$email');";
	
if ($con->query($query) === TRUE) {
    echo "success";
} else {
	echo "Error: " . $query . "<br>" . $con->error;
}
mysqli_close($con);

?>