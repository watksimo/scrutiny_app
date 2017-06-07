<?php

    session_start();

    include 'db_connect.php';

    $del_mile_id = $_POST['del_mile_id'];

    $check_query = "DELETE FROM Milestones WHERE id=$del_mile_id";

    echo $check_query;

    if ($result = $conn->query($check_query)) {
        echo $conn->error;
        # Close db connections
        $conn->close();
    }

?>
