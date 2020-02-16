<?php
require "mysql_connection.php";
	
$med_name = $_REQUEST['med_name'];
$desc = $_REQUEST['desc'];
$quantity = $_REQUEST['quantity'];
$price = $_REQUEST['price'];

$select_query = "SELECT name FROM inventory;";
$result=$con->query($select_query);
if ($result->num_rows < 1) {
	echo "No Medicine";
}else{
	$finalValue = array();
	while ($row = $result->fetch_assoc()) {
		if ($medicine_name=$row["name"]){
			echo $medicine_name;
		}
	}
}

$query = "INSERT INTO inventory (name, medicine_desc, quantity, selling_price) 
		VALUES('$med_name', '$desc', $quantity, $price);";
	
if ($con->query($query) === TRUE) {
    echo "success";
} else {
	echo "Error: " . $query . "<br>" . $con->error;
}
mysqli_close($con);

?>