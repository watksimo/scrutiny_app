<?php
    session_start();

    $trainer_id = $_SESSION['trainer_id'];
    $check_query = "SELECT name AS trainername FROM Trainers WHERE id=$trainer_id";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    if ($result = $conn->query($check_query)) {

		$row = $result->fetch_assoc();	# Guaranteed only 1 due to trainer_id as PK
        echo json_encode($row);
        
        # Close db connections
        $result->free();
        $conn->close();
    }
?>