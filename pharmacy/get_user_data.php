<?php
require "mysql_connection.php";

$user_id=$_REQUEST['username'];
$password=$_REQUEST['password'];
$query = "SELECT * FROM user WHERE user_id='$user_id' AND password='$password';";
$result=$con->query($query);
if ($result->num_rows < 1) {
	echo "No User";
}else{
	$finalValue = array();
	while ($row = $result->fetch_assoc()) {
		$site_id = "".$row["id"];
		$site_name = $row["site_name"];

		array_push($finalValue, array('site_id' => $site_id, 'site_name' => $site_name));
	}
	echo json_encode($finalValue);
}
mysqli_close($con);

?>