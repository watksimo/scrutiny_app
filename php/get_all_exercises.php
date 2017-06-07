<?php
    session_start();
    
    include 'db_connect.php';    

    $check_query = "select * from Exercises;";

    if ($result = $conn->query($check_query)) {

        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);  # Can return multiple rows as a client can have multiple milestones
        echo json_encode($row);
        
        # Close db connections
        $conn->close();
    }
?>
