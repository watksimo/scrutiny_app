<?php

    session_start();

    $sel_client = $_SESSION['sel_client'];
    $add_ques_id = $_POST['add_ques_id'];
    $ques_start_date = $_POST['ques_start_date'];
    $ques_end_date = $_POST['ques_end_date'];


    $check_query = "INSERT INTO ClientsQuestionnaires (clientid,questionnaireid,startdate,enddate) VALUES($sel_client,$add_ques_id, STR_TO_DATE('$ques_start_date', '%Y-%m-%d'),STR_TO_DATE('$ques_end_date', '%Y-%m-%d'))";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    echo $check_query;

    if ($result = $conn->query($check_query)) {
        echo $conn->error;
        # Close db connections
        $conn->close();
    }

?>
