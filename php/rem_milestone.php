<?php

    session_start();

    $rem_mile_id = $_POST['rem_mile_id'];
    $sel_client = $_SESSION['sel_client'];

    $check_query = "DELETE FROM ClientsMilestones WHERE clientid=$sel_client AND milestoneid=$rem_mile_id";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    echo $check_query;

    if ($result = $conn->query($check_query)) {
        echo $conn->error;
        # Close db connections
        $conn->close();
    }

?>
