<?php
    session_start();

    $client_id = $_SESSION['client_id'];
    $check_query = "SELECT Clients.name AS client, Trainers.name AS trainer FROM Clients, Trainers WHERE Clients.trainerid=Trainers.id AND Clients.id=$client_id";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    if ($result = $conn->query($check_query)) {

        # Set client_id as session variable to show login status
		$row = $result->fetch_assoc();	# Guaranteed only 1 due to client_id as PK
        echo json_encode($row);
        
        # Close db connections
        $result->free();
        $conn->close();
    }
?>