<?php

    session_start();

    $new_trainer_name = $_POST['new_trainer_name'];
    $new_trainer_phone = $_POST['new_trainer_phone'];
    $new_trainer_quals = $_POST['new_trainer_quals'];
    $new_trainer_email = $_POST['new_trainer_email'];

    $check_query = "INSERT INTO Trainers (id,name,phone,quals,email) VALUES(0,'$new_trainer_name','$new_trainer_phone','$new_trainer_quals','$new_trainer_email')";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    echo $check_query;

    if ($result = $conn->query($check_query)) {
        echo $conn->error;
        # Close db connections
        $conn->close();
    }

?>
