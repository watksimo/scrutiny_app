<?php

    session_start();

    $sel_client = $_SESSION['sel_client'];
    $add_prog_id = $_POST['add_prog_id'];
    $prog_start_date = $_POST['prog_start_date'];
    $prog_end_date = $_POST['prog_end_date'];
    $prog_load_lvl = $_POST['prog_load_lvl'];


    $check_query = "INSERT INTO ClientsPrograms (clientid,programid,loadlevel,startdate,enddate) VALUES($sel_client,$add_prog_id,'$prog_load_lvl',STR_TO_DATE('$prog_start_date', '%Y-%m-%d'),STR_TO_DATE('$prog_end_date', '%Y-%m-%d'))";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    echo $check_query;

    if ($result = $conn->query($check_query)) {
        echo $conn->error;
        # Close db connections
        $conn->close();
    }

?>
