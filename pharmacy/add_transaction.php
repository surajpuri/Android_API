<?php
require "mysql_connection.php";
$date = $_REQUEST['date'];
$customer_id = $_REQUEST['customer_id'];
$supp_id = $_REQUEST['supplier_id'];
$type = $_REQUEST['type'];
$grand_total = $_REQUEST['grand_total'];


$query = "INSERT INTO transactions (date, customer_id, supplier_id, type, grand_total) 
		VALUES('$date', $customer_id, $supp_id, '$type', $grand_total);";
	
if ($con->query($query) === TRUE) {
    $query = "SELECT id FROM transactions ORDER BY id DESC LIMIT 1";
	$result=$con->query($query);
	if ($result->num_rows < 1) {
		echo "Failed";
	}else{
		$finalValue = array();
		while ($row = $result->fetch_assoc()) {
			$id = "".$row["id"];
			array_push($finalValue, array('id' => $id, 'status' => 'success'));
		}
		echo json_encode($finalValue);
	}
} else {
	echo "Error: " . $query . "<br>" . $con->error;
}
mysqli_close($con);

?>