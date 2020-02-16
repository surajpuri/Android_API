<?php
require "mysql_connection.php";

$query = "SELECT * FROM transactions ORDER BY date DESC;";
$result=$con->query($query);
if ($result->num_rows < 1) {
	echo "No Transcations";
}else{
	$finalValue = array();
	while ($row = $result->fetch_assoc()) {
		$id = "".$row["id"];
		$date = $row["date"];
		$type = $row["type"];
		$grand_total = $row["grand_total"];
		array_push($finalValue, array('id' => $id, 'date' => $date, 'type' => $type, 'grand_total' => $grand_total));
	}
	echo json_encode($finalValue);
}
mysqli_close($con);

?>