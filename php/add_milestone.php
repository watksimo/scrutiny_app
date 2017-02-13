<?php

    session_start();

    $returnval = 0;

    $mile_name = $_POST['mile_name'];
    $mile_type = $_POST['mile_type'];
    $mile_comments = $_POST['mile_comments'];
    $mile_date = $_POST['mile_date'];

    $check_query = "INSERT INTO Milestones (id,name,type,comments,date) VALUES(0,'$mile_name','$mile_type','$mile_comments',STR_TO_DATE('$mile_date', '%Y-%m-%d'))";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    echo $check_query;

    if ($result = $conn->query($check_query)) {
        echo $conn->error;
        # Close db connections
        $conn->close();
    }

?>
