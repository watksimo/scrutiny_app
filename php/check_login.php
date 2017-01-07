<?php
	#########################################
	# Possible output:						#
	#   '0' - no trainers or clients found 	#
	#   '1' - client found 					#
	#   '2' - trainer found 				#
	#########################################

    session_start();

    $returnval = 0;

    $email = $_POST['email'];
    $check_query = "SELECT id FROM Clients WHERE email='$email'";
    $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

    if ($result = $conn->query($check_query)) {

    	if($result->num_rows > 0) {
			$returnval = 1;
			# Set client_id as session variable to show login status
			$row = $result->fetch_array();	# Guaranteed only 1 due to email as unique
        	$_SESSION['client_id'] = $row["id"];
    	}
    }
    if($returnval == 0) {
    	$check_query = "SELECT id FROM Trainers WHERE email='$email'";
    	if ($result = $conn->query($check_query)) {

	    	if($result->num_rows > 0) {
				$returnval = 2;
				# Set client_id as session variable to show login status
				$row = $result->fetch_array();	# Guaranteed only 1 due to email as unique
	        	$_SESSION['trainer_id'] = $row["id"];
	    	}
    	}
    }

    echo $returnval;

    # Close db connections
    $result->free();
    $conn->close();
?>
