<?php
    session_start();

    include 'db_connect.php';

    $client_id = $_SESSION['client_id'];
    $check_query = "SELECT Clients.name AS client, Trainers.name AS trainer FROM Clients, Trainers WHERE Clients.trainerid=Trainers.id AND Clients.id=$client_id";

    if ($result = $conn->query($check_query)) {

		$row = $result->fetch_assoc();	# Guaranteed only 1 due to client_id as PK
        echo json_encode($row);
        
        # Close db connections
        $conn->close();
    }
?>
