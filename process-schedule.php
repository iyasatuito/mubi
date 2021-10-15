<?php

    session_start();

    // connect to database
    require 'partials/connect.php';

    $date = $_POST['date'];
    // $lname = $_POST['lname'];
    // $email = $_POST['email'];
    // $password = $_POST['password'];
    $id = $_SESSION['movieID'];

    // get distinct cinemas for this movie and date
    $cinemas = $mysqli->query("SELECT DISTINCT schedule.cinemaID, cinema.cinemaName FROM schedule
        INNER JOIN cinema ON schedule.cinemaID = cinema.cinemaID
        WHERE movieID = '$id' AND scheduleDate = '$date'
    ");

    // query movie schedules
    $schedules = $mysqli->query("SELECT * FROM schedule
        INNER JOIN cinema ON schedule.cinemaID = cinema.cinemaID
        WHERE movieID = '$id' AND scheduleDate = '$date'
        ORDER BY scheduleTime
    ");

    while($cinema = $cinemas->fetch_object()) {
        echo '<div class="subheading">';
        echo $cinema->cinemaName;
        echo '</div>';
        echo '<div class="times">';

        while($schedule = $schedules->fetch_object()) {
            if($cinema->cinemaID==$schedule->cinemaID){
                echo '<a href="booking.php?id='.$schedule->scheduleID.'"><span class="time">';
                echo $schedule->scheduleTime;
                echo '</span></a>';
            }
        }
        echo '</div>';
    }

    // // set message depending on result
    // if($mysqli->query($statement) === TRUE){
    //     echo json_encode($cinemas);
    // }else{
    //     echo json_encode('Something went wrong. Please try again.');
    // }
?>