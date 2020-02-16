<?php
require "mysql_connection.php";
	
$id = $_REQUEST['id'];
$selling_price = $_REQUEST['selling_price'];


$query = "UPDATE inventory SET selling_price = $selling_price WHERE id = $id;";
	
if ($con->query($query) === TRUE) {
    echo "success";
} else {
	echo "Error: " . $query . "<br>" . $con->error;
}
mysqli_close($con);

?>