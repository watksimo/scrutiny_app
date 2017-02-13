<?php
    session_start();

    $rem_id = $_POST['rem_client'];
    $check_query = "UPDATE Clients SET trainerid=0 WHERE id=$rem_id";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    if ($result = $conn->query($check_query)) {        
        # Close db connections
        $conn->close();
    }
?>