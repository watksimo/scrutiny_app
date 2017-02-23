<?php
    session_start();

    $trainer_id = $_SESSION['trainer_id'];
    $client_id = $_SESSION['sel_client'];
    $check_query = "select * from Programs where id not in (select programid from ClientsPrograms where clientid=$client_id);";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    if ($result = $conn->query($check_query)) {

		$row = mysqli_fetch_all($result,MYSQLI_ASSOC);
        echo json_encode($row);
        
        # Close db connections
        $result->free();
        $conn->close();
    }
?>