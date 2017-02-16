<?php

    session_start();

    $del_mile_id = $_POST['del_mile_id'];

    $check_query = "DELETE FROM Milestones WHERE id=$del_mile_id";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    echo $check_query;

    if ($result = $conn->query($check_query)) {
        echo $conn->error;
        # Close db connections
        $conn->close();
    }

?>
