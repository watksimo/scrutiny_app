<?php
    session_start();

    if( isset($_SESSION['trainer_id']) ) {
        if(isset($_SESSION['sel_client'])) {
            $sel = $_SESSION['sel_client'];

            $check_query = "SELECT name FROM Clients WHERE id=$sel";
            $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

            if ($result = $conn->query($check_query)) {

                $row = $result->fetch_assoc();  # Guaranteed only 1 due to client_id as PK
                echo "Viewing: " . $row['name'];
                $_SESSION['sel_client_name'] = $row['name'];
                # Close db connections
                $conn->close();
            }
            
        } else {
            echo 'Trainer';
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