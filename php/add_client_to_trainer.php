<?php
    session_start();

    $add_id = $_POST['clientid'];
    $train_id = $_SESSION['trainer_id'];
    
    $check_query = "UPDATE Clients SET trainerid=$train_id WHERE id=$add_id";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    if ($result = $conn->query($check_query)) {        
        # Close db connections
        $result->free();
        $conn->close();
    }
?>