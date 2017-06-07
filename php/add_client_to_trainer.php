<?php
    session_start();

    include 'db_connect.php';

    $add_id = $_POST['clientid'];
    $train_id = $_SESSION['trainer_id'];

    $check_query = "UPDATE Clients SET trainerid=$train_id WHERE id=$add_id";

    if ($result = $conn->query($check_query)) {
        # Close db connections
        $conn->close();
    }
?>
