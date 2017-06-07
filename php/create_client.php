<?php

    session_start();

    include 'db_connect.php';

    $new_client_name = $_POST['new_client_name'];
    $new_client_type = $_POST['new_client_type'];
    $new_client_phone = $_POST['new_client_phone'];
    $new_client_email = $_POST['new_client_email'];
    $new_client_comments = $_POST['new_client_comments'];

    $check_query = "INSERT INTO Clients (id, name, type, phone, email, comments, trainerid, start_date) VALUES (0,'$new_client_name','$new_client_type','$new_client_phone','$new_client_email','$new_client_comments',0,NOW());";

    echo $check_query;

    if ($result = $conn->query($check_query)) {
        echo $conn->error;
        # Close db connections
        $conn->close();
    }

?>
