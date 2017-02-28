<?php
    session_start();
    
    $check_query = "select * from Exercises;";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    if ($result = $conn->query($check_query)) {

        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);  # Can return multiple rows as a client can have multiple milestones
        echo json_encode($row);
        
        # Close db connections
        $conn->close();
    }
?>