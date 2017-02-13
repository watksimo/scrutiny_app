<?php
    session_start();

    if( isset($_SESSION['trainer_id']) ) {
        $trainer_id = $_SESSION['trainer_id'];
        $check_query = "SELECT name AS trainername FROM Trainers WHERE id=$trainer_id";
        $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

        if ($result = $conn->query($check_query)) {

            $row = $result->fetch_assoc();  # Guaranteed only 1 due to trainer_id as PK
            echo $row["trainername"] . "'s Trainer Page";
            
            # Close db connections
            $conn->close();
        }
    } else {
        $client_id = $_SESSION['client_id'];
        $check_query = "SELECT Clients.name AS client, Trainers.name AS trainer FROM Clients, Trainers WHERE Clients.trainerid=Trainers.id AND Clients.id=$client_id";
        $conn=mysqli_connect('127.0.0.1','root','GoCanvas','scrutiny');

        if ($result = $conn->query($check_query)) {

            $row = $result->fetch_assoc();  # Guaranteed only 1 due to client_id as PK
            echo $row["client"] . "'s Training";
            
            # Close db connections
            $conn->close();
        }

    }

    
?>