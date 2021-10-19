<?php

    session_start();
 
    require 'partials/connect.php';

    $schedID = $_POST['schedID']; //must be generated
    $movTitle = $_POST['movieTitle'];
    $cinemaName = $_POST['cinemaName'];
    $scheduleDate = $_POST['scheduleDate'];
    $scheduleTime = $_POST['schedTime'];

    $sql = "SELECT movieID, cinemaID FROM movie CROSS JOIN cinema WHERE movieTitle = '$movTitle' AND cinemaName = '$cinemaName';";
    $results = $mysqli->query($sql)->fetch_object();
    $movID = $results->movieID;
    $cinemaID = $results->cinemaID;

    $sql2 = "INSERT INTO schedule VALUES ('$schedID','$movID','$cinemaID','$scheduleDate','$scheduleTime');";

    // set message depending on result
    if(!empty($mysqli->query($sql2))){
        $_SESSION['feedback'] = "You have successfully added a schedule.";
    } else {
        $_SESSION['feedback'] = "Sorry, something went wring.";
    }

     // redirect to review page
     $host  = $_SERVER['HTTP_HOST'];
     $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
     $extra = 'schedule.php';
     header("Location: http://$host$uri/$extra");
?>