<?php
require "mysql_connection.php";

$id = $_REQUEST['id'];
$query = "SELECT * FROM inventory WHERE id = $id;";
$result=$con->query($query);
if ($result->num_rows < 1) {
	echo "No inventory";
}else{
	$finalValue = array();
	while ($row = $result->fetch_assoc()) {
		$id = "".$row["id"];
		$name = $row["name"];
		$medicine_desc = $row["medicine_desc"];
		$quantity = $row["quantity"];
		$selling_price = $row["selling_price"];
		array_push($finalValue, array('id' => $id, 'name' => $name, 'medicine_desc' => $medicine_desc, 'quantity' => $quantity, 'selling_price' => $selling_price));
	}
	echo json_encode($finalValue);
}
mysqli_close($con);

?>