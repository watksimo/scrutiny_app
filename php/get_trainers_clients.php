<?php
    session_start();

    include 'db_connect.php';

    $trainer_id = $_SESSION['trainer_id'];
    $check_query = "SELECT Clients.id, Clients.name FROM Clients,Trainers WHERE Trainers.id=$trainer_id AND Clients.trainerid=Trainers.id";

    if ($result = $conn->query($check_query)) {

		$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($row);
        
        # Close db connections
        $result->free();
        $conn->close();
    }
?>
