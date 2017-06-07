<?php
    session_start();

    include 'db_connect.php';

    $rem_id = $_POST['rem_client'];
    $check_query = "UPDATE Clients SET trainerid=0 WHERE id=$rem_id";

    if ($result = $conn->query($check_query)) {        
        # Close db connections
        $conn->close();
    }
?>
