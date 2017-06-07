<?php
    session_start();

    include 'db_connect.php';

    $trainer_id = $_SESSION['trainer_id'];
    $check_query = "SELECT id, name FROM Clients WHERE trainerid=0";

    if ($result = $conn->query($check_query)) {

        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($row);
        
        # Close db connections
        $result->free();
        $conn->close();
    }
?>
