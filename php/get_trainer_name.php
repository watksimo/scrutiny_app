<?php
    session_start();

    include 'db_connect.php';

    $trainer_id = $_SESSION['trainer_id'];
    $check_query = "SELECT name AS trainername FROM Trainers WHERE id=$trainer_id";

    if ($result = $conn->query($check_query)) {

		$row = $result->fetch_assoc();	# Guaranteed only 1 due to trainer_id as PK
        echo json_encode($row);
        
        # Close db connections
        $result->free();
        $conn->close();
    }
?>
