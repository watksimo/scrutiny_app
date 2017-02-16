<?php
    session_start();

    if(isset($_SESSION['trainer_id'])) {
        $client_id = $_SESSION['sel_client'];
    } else {
        $client_id = $_SESSION['client_id'];
    }
    
    $check_query = "SELECT * FROM Milestones WHERE id NOT IN (SELECT milestoneid FROM ClientsMilestones);";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    if ($result = $conn->query($check_query)) {

        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);  # Can return multiple rows as a client can have multiple milestones
        echo json_encode($row);
        
        # Close db connections
        $conn->close();
    }
?>