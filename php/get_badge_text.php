<?php
    session_start();

    if( isset($_SESSION['trainer_id']) ) {
        if(isset($_SESSION['sel_client'])) {
        echo "Client: " . $_SESSION['sel_client_name'];
            
        } else {
            echo 'Select Client';
        }
        
    } else {
        $client_id = $_SESSION['client_id'];
        $check_query = "SELECT Clients.name AS client, Trainers.name AS trainer FROM Clients, Trainers WHERE Clients.trainerid=Trainers.id AND Clients.id=$client_id";
        $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

        if ($result = $conn->query($check_query)) {

            $row = $result->fetch_assoc();  # Guaranteed only 1 due to client_id as PK
            echo "Trainer: " . $row['trainer'];
            
            # Close db connections
            $conn->close();
        }

    }

    
?>
