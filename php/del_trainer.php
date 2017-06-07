<?php

    session_start();

    include 'db_connect.php';

    $del_trainer_id = $_POST['del_trainer_id'];

    $check_query = "UPDATE Clients SET trainerid=0 WHERE trainerid=$del_trainer_id";
    $conn->query($check_query);
    $check_query = "DELETE FROM Trainers WHERE id=$del_trainer_id";

    echo $check_query;

    if ($result = $conn->query($check_query)) {
        echo $conn->error;
        # Close db connections
        $conn->close();
    }

?>
