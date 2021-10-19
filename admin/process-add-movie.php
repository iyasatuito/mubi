<?php

    session_start();

    // connect to database
    require 'partials/connect.php';

    $movTitle = $_POST['movTitle'];
    $movDescription = $_POST['movDescription'];
    $movDirector = $_POST['movDirector'];
    $movActor = $_POST['movActor'];
    $movDuration = $_POST['movDuration'];
    $movBanner = $_POST['movBanner'];
    $movPoster = $_POST['movPoster'];
    $movID = $_POST['movieID'];
    $trailer =  $_POST['trailer']; //must be utube id
    $isFeature = $_POST['isFeatured']; 
    $isScreening = $_POST['isScreening']; 


    $sql = "INSERT INTO movie VALUES ('$movID','$movTitle','$movDescription','$movDirector','$movActor','$movDuration', '$movBanner', '$movPoster', '$trailer', '$isFeature', '$isScreening');";

    if(!empty($mysqli->query($sql))){
    // if($sql ->num_rows == 1){            
        // header("location: welcome.php"); todo verify
        echo json_encode('You have successfully updated your account.');
    } else {
        echo json_encode('Cannot update. Please try again.');
    }
?>