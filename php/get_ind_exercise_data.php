<?php
    session_start();

    $exer_id = $_POST['exer_id'];
    $check_query = "SELECT * FROM Exercises WHERE id=$exer_id";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    if ($result = $conn->query($check_query)) {

		$row = $result->fetch_assoc();	# Guaranteed only 1 due to exer_id as PK
        echo json_encode($row);
        
        # Close db connections
        $result->free();
        $conn->close();
    }
?>