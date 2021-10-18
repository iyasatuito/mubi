<?php

    session_start();
 
    require 'partials/connect.php';

    $schedID = "S007"; //must be generated
    $movTitle = $_POST['movieTitle'];
    $cinemaName = $_POST['cinemaName'];
    $scheduleDate = $_POST['scheduleDate'];
    $scheduleTime = "9:00:00";

    $sql = "SELECT movieID, cinemaID FROM movie CROSS JOIN cinema WHERE movieTitle = '$movTitle' AND cinemaName = '$cinemaName';";
    $results = $mysqli->query($sql)->fetch_object();
    $movID = $results->movieID;
    $cinemaID = $results->cinemaID;

    $sql2 = "INSERT INTO schedule VALUES ('$schedID','$movID','$cinemaID','$scheduleDate','$scheduleTime');";

    // set message depending on result
    if(!empty($mysqli->query($sql2))){
    
        echo json_encode('You have successfully added a movie schedule.');
    } else {
        echo json_encode('Cannot login. Please try again.');
    }
?>