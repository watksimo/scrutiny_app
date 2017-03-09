<?php

    session_start();

    $del_trainer_id = $_POST['del_trainer_id'];

    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

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
