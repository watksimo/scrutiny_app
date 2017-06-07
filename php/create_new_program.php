<?php

    session_start();

    include 'db_connect.php';

    $returnval = 0;

    $program_name = $_POST['program_name'];
    $program_type = $_POST['program_type'];
    $program_comments = $_POST['program_comments'];

    $program_exercises = $_POST['program_exercises'];
    $program_exercises_list = json_decode($program_exercises);

    $check_query = "INSERT INTO Programs (id,name,type,comments) VALUES(0,'$program_name','$program_type','$program_comments')";
    $conn->query($check_query);


    $check_query = "SELECT LAST_INSERT_ID() AS program_id";
    $result = $conn->query($check_query);
    $row = $result->fetch_assoc();
    // echo $row["program_id"];
    $programid = $row["program_id"];

    // echo $programid;

    foreach ($program_exercises_list as $exercise) {
        $exerciseid = $exercise->{"exerciseid"};
        $position = $exercise->{"position"};
        $num_sets = $exercise->{"num_sets"};
        $num_reps = $exercise->{"num_reps"};
        $tempo = $exercise->{"tempo"};
        $rpe = $exercise->{"rpe"};
        $comments = $exercise->{"comments"};
        
        $check_query = "INSERT INTO ProgramsExercises (programid,exerciseid,position,num_sets,num_reps,tempo,rpe,comments) VALUES($programid,$exerciseid,$position,'$num_sets','$num_reps','$tempo','$rpe','$comments')";

        $conn->query($check_query);

        // echo $check_query;
    }

    $conn->close();

    
    

    // echo $check_query;

    // if ($result = $conn->query($check_query)) {
    //     echo $conn->error;
    //     # Close db connections
    //     $conn->close();
    // }

    

?>
