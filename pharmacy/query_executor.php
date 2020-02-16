<?php
require "mysql_connection.php";
	
$query = urldecode($_REQUEST['query']);

if ($con->query($query) === TRUE) {
    echo "success";
} else {
	echo "Error: " . $query . "<br>" . $con->error;
}
mysqli_close($con);

?>