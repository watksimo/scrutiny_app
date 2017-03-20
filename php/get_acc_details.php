<?php
    session_start();
    
    if(isset($_SESSION['trainer_id'])) {
        $trainer_id = $_SESSION['trainer_id'];
        $check_query = "select * from Trainers where id=$trainer_id;";
    } else {
        $client_id = $_SESSION['client_id'];
        $check_query = "select * from Clients where id=$client_id;";
    }
    
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    if ($result = $conn->query($check_query)) {

        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);  # Can only return 1 row

        if(isset($_SESSION['trainer_id'])) {
            $row[0]["trainer"] = 1;
        } else {
            $row[0]["trainer"] = 0;
        }
        echo json_encode($row[0]);
        
        # Close db connections
        $conn->close();
    }
?>