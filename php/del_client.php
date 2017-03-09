<?php

    session_start();

    $del_client_id = $_POST['del_client_id'];

    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    $check_query = "DELETE FROM ClientsMilestones WHERE clientid=$del_client_id";
    $conn->query($check_query);
    $check_query = "DELETE FROM ClientsInjuries WHERE clientid=$del_client_id";
    $conn->query($check_query);
    $check_query = "DELETE FROM ClientsQuestionnaires WHERE clientid=$del_client_id";
    $conn->query($check_query);
    $check_query = "DELETE FROM ClientsPrograms WHERE clientid=$del_client_id";
    $conn->query($check_query);
    $check_query = "DELETE FROM TrackingValues WHERE trackingid IN (SELECT id FROM Tracking WHERE clientid=$del_client_id)";
    $conn->query($check_query);
    $check_query = "DELETE FROM Tracking WHERE clientid=$del_client_id";
    $conn->query($check_query);
    $check_query = "DELETE FROM Clients WHERE id=$del_client_id";

    echo $check_query;

    if ($result = $conn->query($check_query)) {
        echo $conn->error;
        # Close db connections
        $conn->close();
    }

?>
