<?php
require "mysql_connection.php";
	
$query = urldecode($_REQUEST['query']);

$result=$con->query($query);
if ($result->num_rows < 1) {
	echo "No Transcations";
}else{
	$finalValue = array();
	while ($row = $result->fetch_assoc()) {
		$name = "".$row["name"];
		$med_name = "".$row["med_name"];
		$quantity = $row["quantity"];
		$price = $row["price"];
		array_push($finalValue, array('name' => $name, 'med_name' => $med_name, 'quantity' => $quantity, 'price' => $price));
	}
	echo json_encode($finalValue);
}
mysqli_close($con);

?>