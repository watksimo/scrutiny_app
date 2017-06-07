<?php

    session_start();

    include 'db_connect.php';

    $add_mile_id = $_POST['add_mile_id'];
    $sel_client = $_SESSION['sel_client'];

    $check_query = "INSERT INTO ClientsMilestones (clientid,milestoneid) VALUES($sel_client,$add_mile_id)";

    echo $check_query;

    if ($result = $conn->query($check_query)) {
        echo $conn->error;
        # Close db connections
        $conn->close();
    }

?>
