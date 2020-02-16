<?php
require "mysql_connection.php";

$query = "SELECT * FROM supplier;";
$result=$con->query($query);
if ($result->num_rows < 1) {
	echo "No Supplier";
}else{
	$finalValue = array();
	while ($row = $result->fetch_assoc()) {
		$id = "".$row["id"];
		$name = $row["name"];
		$number = $row["number"];
		$address = $row["address"];
		$email = $row["email"];
		array_push($finalValue, array('id' => $id, 'name' => $name, 'number' => $number, 'address' => $address, 'email' => $email));
	}
	echo json_encode($finalValue);
}
mysqli_close($con);

?>