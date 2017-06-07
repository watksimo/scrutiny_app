<?php

    session_start();

    # Close db connections
            $conn->close();

    $rem_prog_id = $_POST['rem_prog_id'];
    $sel_client = $_SESSION['sel_client'];

    $check_query = "DELETE FROM ClientsPrograms WHERE clientid=$sel_client AND programid=$rem_prog_id";

    echo $check_query;

    if ($result = $conn->query($check_query)) {
        echo $conn->error;
        # Close db connections
        $conn->close();
    }

?>
