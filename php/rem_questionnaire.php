<?php

    session_start();

    include 'db_connect.php';

    $rem_ques_id = $_POST['rem_ques_id'];
    $sel_client = $_SESSION['sel_client'];

    $check_query = "DELETE FROM ClientsQuestionnaires WHERE clientid=$sel_client AND questionnaireid=$rem_ques_id";

    echo $check_query;

    if ($result = $conn->query($check_query)) {
        echo $conn->error;
        # Close db connections
        $conn->close();
    }

?>
