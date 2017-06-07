<?php
    session_start();

    include 'db_connect.php';

    if(isset($_SESSION['trainer_id'])) {
        $client_id = $_SESSION['sel_client'];
    } else {
        $client_id = $_SESSION['client_id'];
    }
    
    $check_query = "select * from Programs where id in (select programid from ClientsPrograms where clientid=$client_id);";

    if ($result = $conn->query($check_query)) {

        $row = mysqli_fetch_all($result,MYSQLI_ASSOC);  # Can return multiple rows as a client can have multiple milestones
        echo json_encode($row);
        
        # Close db connections
        $conn->close();
    }
?>
