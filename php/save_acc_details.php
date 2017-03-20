<?php

    session_start();

    $acc_name = $_POST['acc_name'];
    $acc_phone = $_POST['acc_phone'];
    $acc_email = $_POST['acc_email'];

    if( isset($_SESSION['trainer_id']) ) {
        $acc_quals = $_POST['acc_quals'];
        $trainer_id = $_SESSION['trainer_id'];
        $check_query = "UPDATE Trainers SET name='$acc_name', phone='$acc_phone', email='$acc_email', quals='$acc_quals' WHERE id=$trainer_id;";
    } else {
        $client_id = $_SESSION['client_id'];
        $check_query = "UPDATE Clients SET name='$acc_name', phone='$acc_phone', email='$acc_email' WHERE id=$client_id;";
    }

    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    echo $check_query;

    if ($result = $conn->query($check_query)) {
        echo $conn->error;
        # Close db connections
        $conn->close();
    }

?>
