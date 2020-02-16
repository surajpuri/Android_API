<?php
require "mysql_connection.php";
	
$id = $_REQUEST['id'];
$name = $_REQUEST['name'];
$email = urldecode($_REQUEST['email']);
$number = $_REQUEST['number'];
$address = $_REQUEST['address'];


$query = "UPDATE customer SET name = '$name', number = '$number', address = '$address', email = '$email' WHERE id = $id;";
	
if ($con->query($query) === TRUE) {
    echo "success";
} else {
	echo "Error: " . $query . "<br>" . $con->error;
}
mysqli_close($con);

?>