<?php
	session_start();

    include 'db_connect.php';

	$_SESSION['sel_client'] = $_POST['sel_client'];
	$sel = $_SESSION['sel_client'];	

    $check_query = "SELECT name FROM Clients WHERE id=$sel";

	if ($result = $conn->query($check_query)) {

		$row = $result->fetch_assoc();  # Guaranteed only 1 due to client_id as PK
		$_SESSION['sel_client_name'] = $row['name'];
		# Close db connections
		$conn->close();
	} 
?>
