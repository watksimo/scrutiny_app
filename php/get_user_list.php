<?php
    session_start();

    include 'db_connect.php';

    $trainer_id = $_SESSION['trainer_id'];
    $client_id = $_SESSION['sel_client'];
    $check_query = "select Clients.id, Clients.name, 'client' as type from Clients union all select Trainers.id, Trainers.name, 'trainer' as type from Trainers where id<>$trainer_id and id<>0;";

    if ($result = $conn->query($check_query)) {

		$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($row);
        
        # Close db connections
        $result->free();
        $conn->close();
    }
?>
