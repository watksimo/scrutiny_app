<?php

    session_start();

    $rem_ques_id = $_POST['rem_ques_id'];
    $sel_client = $_SESSION['sel_client'];

    $check_query = "DELETE FROM ClientsQuestionnaires WHERE clientid=$sel_client AND questionnaireid=$rem_ques_id";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    echo $check_query;

    if ($result = $conn->query($check_query)) {
        echo $conn->error;
        # Close db connections
        $conn->close();
    }

?>
