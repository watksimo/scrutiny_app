<?php
    session_start();

    $client_id = $_SESSION['client_id'];
    $check_query = "select Clients.id, Milestones.* from Clients, Milestones,ClientsMilestones WHERE Clients.id=$client_id AND Clients.id=ClientsMilestones.clientid and ClientsMilestones.milestoneid=Milestones.id";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    if ($result = $conn->query($check_query)) {

        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);  # Can return multiple rows as a client can have multiple milestones
        echo json_encode($row);
        
        # Close db connections
        $result->free();
        $conn->close();
    }
?>