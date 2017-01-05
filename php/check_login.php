<?php
    session_start();

    $email = $_POST['email'];
    $check_query = "SELECT id FROM Clients WHERE email='$email'";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    if ($result = $conn->query($check_query)) {
        
        # Put result to page for pasing by js
        echo "$result->num_rows";

        # Set client_id as session variable to show login status
		$row = $result->fetch_array();	# Guaranteed only 1 due to email as unique
        $_SESSION['client_id'] = $row["id"];
        
        # Close db connections
        $result->free();
        $conn->close();
    }
?>
