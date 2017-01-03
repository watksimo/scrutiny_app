<?php
    $email = $_POST['email'];
    $check_query = "SELECT * FROM Clients WHERE email='$email'";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    if ($result = $conn->query($check_query)) {
        echo "$result->num_rows";
        $result->close();
        $conn->close();
    }
?>
